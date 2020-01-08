<?php


class LayoutInterface
{
    protected $css = [];
    protected $js = [];

    function __construct($css = null, $js = null)
    {
        if (!empty($css)) {
            $this->addCSS($css);
        }
        if (!empty($js)) {
            $this->addJS($js);
        }
    }

    /**
     * Create the header of the system
     */
    public function header($page = null)
    {
        ?>
            <!DOCTYPE HTML>
            <html lang="en">
                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <?php
                        foreach ($this->css as $css) {
                            ?>
                            <link rel="stylesheet" type="text/css" href="<?= $css ?>"><?php
                        }
                    ?>
                    <title><?= (isset($page) ? $page : null) ?></title>
                </head>
                <body>
        <?php
    }

    /**
     * Create the footer and include the JS needed in the system
     */
    public function footer()
    {
        if (count($this->js) > 0) {
            foreach ($this->js as $js) {
                ?>
                <script src="<?= $js ?>"></script>
                <?php
            }
        }
        ?>
            </body></html>
        <?php
    }

    /**
     * @param $path string / array
     */
    public function addCSS($path)
    {
        if (is_array($path)) {
            foreach ($path as $file) {
                $this->css[] = $file;
            }
        } else {
            $this->css[] = $path;
        }
    }

    /**
     * @param $path string /array
     */
    public function addJS($path)
    {
        if (is_array($path)) {
            foreach ($path as $file) {
                $this->js[] = $file;
            }
        } else {
            $this->js[] = $path;
        }
    }

    public function loadJS()
    {
        if (count($this->js) > 0) {
            foreach ($this->js as $js) {
                $html = "<script src='{$js}'></script>" . PHP_EOL;
                print $html;
            }
        }
    }

    /**
     * @return array
     */
    public function getCSS()
    {
        return $this->css;
    }

    /**
     * @return array
     */
    public function getJS()
    {
        return $this->js;
    }

    public function navigationBar($activeNavbar)
    {

    }
}