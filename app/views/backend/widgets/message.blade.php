@if (Session::has('msg')) 
<div class="alert alert-<?php echo Session::get('msg')['code']; ?>">
    <button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
    <?php
        $messages = Session::get('msg')['messages'];
    ?>
    <?php if(is_array($messages)):?>
        <?php foreach($messages as $_key => $_value):?>
            <?php foreach($_value as $__value):?>
            <p><i class="ace-icon fa fa-times"></i>&nbsp;{{ $__value }}</p>
            <?php endforeach;?>
        <?php endforeach;?>
    <?php else:?>
        <?php if(Session::get('msg')['code'] == 'success'):?>
        <p><i class="ace-icon fa fa-check"></i>&nbsp;{{ $messages }}</p>
        <?php elseif (Session::get('msg')['code'] == 'danger'):?>
        <p><i class="ace-icon fa fa-times"></i>&nbsp;{{ $messages }}</p>
        <?php else:?>
        <p>&nbsp;{{ $messages }}</p>
        <?php endif;?>
    <?php endif;?>
</div>
@endif