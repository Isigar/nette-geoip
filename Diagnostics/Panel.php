<?php
/**
 * Created by PhpStorm.
 * User: relisoft
 * Date: 1/18/18
 * Time: 10:58 AM
 */

namespace Relisoft\Geoip\Diagnostics;


use Nette\Object;
use Nette\Utils\Callback;
use Nette\Utils\Html;
use Relisoft\Geoip\Geoip;
use Tracy\Debugger;
use Tracy\Dumper;
use Tracy\IBarPanel;

class Panel extends Object implements IBarPanel
{
    /**
     * @var int
     */
    private $totalTime = 0;
    /**
     * @var array
     */
    private $calls = [];
    /**
     * @var \stdClass
     */
    private $current;

    /**
     * Renders HTML code for custom tab.
     * @return string
     */
    function getTab()
    {
        $logo = Html::el("img");
        $logo->src = 'data:image/png;base64,'.base64_encode(file_get_contents(__DIR__ . '/logo.png'));
        $logo->width = "18px";
        $tab = Html::el()->addHtml($logo);
        $title = Html::el('span', ['class' => 'tracy-label'])->title('Facebook');
        if ($this->calls) {
            $title->setText(
                count($this->calls) . ' call' . (count($this->calls) > 1 ? 's' : '') .
                ' / ' . sprintf('%0.2f', $this->totalTime) . ' s'
            );
        } else {
            $title->setText('GeoIP');
        }
        return (string)$tab->addHtml($title);
    }

    /**
     * Renders HTML code for custom panel.
     * @return string
     */
    function getPanel()
    {
        if (!$this->calls) {
            return NULL;
        }
        ob_start();
        if (class_exists('Latte\Runtime\Filters')) {
            $esc = Callback::closure('Latte\Runtime\Filters::escapeHtml');
        } else {
            $esc = 'Nette\Templating\Helpers::escapeHtml';
        }
        $click = class_exists('\Tracy\Dumper')
            ? function ($o, $c = FALSE) { return \Tracy\Dumper::toHtml($o, ['collapse' => $c]); }
            : '\Tracy\Helpers::clickableDump';
        $totalTime = $this->totalTime ? sprintf('%0.3f', $this->totalTime * 1000) . ' ms' : 'none';
        require __DIR__ . '/panel.phtml';
        return ob_get_clean();
    }

    public function begin($key){
        if($this->current) return;

        $this->calls[] = $this->current = (object)[
            "key" => $key,
            "result" => null,
            "time" => 0
        ];
    }

    public function finished($result,$time){
        if(!$this->current) return;
        $this->totalTime += $this->current->time = $time;
        $this->current->result = $result;
        $this->current->time = $time;
        $this->current = null;
    }

    public function register(Geoip $geoip){
        $geoip->onRequest[] = $this->begin;
        $geoip->onFinished[] = $this->finished;

        Debugger::getBar()->addPanel($this);

    }
}