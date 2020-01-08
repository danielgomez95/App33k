<?php


class ModalInterface
{
    public function __construct($inputs = [], $saveButton = false, $title = null)
    {
        $container = '
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
        
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">'.$title.'</h4>
                        </div>
                        <div class="modal-body">
        ';
        if (!empty($inputs)) {
            foreach ($inputs as $reference => $type) {
                $label = ucfirst($reference);
                $container .= "
                    <div>
                        <label>{$label}</label>
                        <input class='form-control' type='{$type}' name='{$reference}' id='{$reference}'>
                    </div>
                ";
            }
        }
        if (!empty($saveButton)) {
            $button = "<button type='button' class='btn btn-default' id='modalSave' name='modalSave' data-dismiss='modal'>Save</button>";
        }
        $container .= '
                        </div>
                        <div class="modal-footer">
                            '.$button.'
                        </div>
                    </div>
        
                </div>
            </div>
        ';
        echo $container;
    }
}