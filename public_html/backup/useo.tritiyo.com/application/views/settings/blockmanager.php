<div class="row">
    <div class="col-md-7">
        <?php
        //owndebugger((isset($blockinfomation) ? $blockinfomation : ''));
        ?>
        <?php echo form_start_divs('Add New Block', 'block manager'); ?>
        <?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'addBlockForm')); ?>
        <div class="form-group">
            <label class="col-md-1">Block Name</label>
            <div class="col-md-5">
                <?php
                $data = array(
                    'name' => 'blockid',
                    'type' => 'hidden',
                    'value' => (isset($blockinfomation->BlockId) ? $blockinfomation->BlockId : 'none'),
                );
                echo form_input($data);
                $data = array(
                    'name' => 'blockuniqueid',
                    'id' => 'blockuniqueid',
                    'type' => 'hidden',
                    'value' => (isset($blockinfomation->BlockUniqueId) ? $blockinfomation->BlockUniqueId : __random()),
                );
                echo form_input($data);
                $data = array(
                    'name' => 'blockname',
                    'id' => 'blockname',
                    'class' => 'form-control',
                    'required' => 'required',
                    'value' => (isset($blockinfomation->BlockTitle) ? $blockinfomation->BlockTitle : ''),
                );
                echo form_input($data);
                ?>
            </div>
            <div class="col-md-3">
                <?php
                $data = array(
                    'name' => 'blockclasses',
                    'id' => 'blockclasses',
                    'class' => 'form-control',
                    'value' => (isset($blockinfomation->TitleClasses) ? $blockinfomation->TitleClasses : ''),
                    'placeholder' => 'Block Title CSS classes'
                );
                echo form_input($data);
                ?>
            </div>
            <div class="col-md-3">
                <?php
                $options = array(
                    '0' => 'Select a value',
                    '1' => 'Block 1',
                    '2' => 'Block 2',
                    '3' => 'Block 3',
                    '4' => 'Block 4',
                    '5' => 'Block 5',
                    '6' => 'Block 6',
                    '7' => 'Block 7',
                    '8' => 'Block 8',
                    '9' => 'Block 9',
                    '10' => 'Block 10',
                    '11' => 'Block 11',
                    '12' => 'Block 12',
                    '13' => 'Block 13',
                    '14' => 'Block 14',
                    '15' => 'Block 15',
                    '16' => 'Block 16',
                    '17' => 'Block 17',
                    '18' => 'Block 18',
                    '19' => 'Block 19',
                    '20' => 'Block 20',
                    '21' => 'Block 21',
                    '22' => 'Block 22',
                    '23' => 'Block 23',
                    '24' => 'Block 24',
                    '25' => 'Block 25',
                    '26' => 'Block 26',
                    '27' => 'Block 27',
                    '28' => 'Block 28',
                    '29' => 'Block 29',
                    '30' => 'Block 30',
                    '31' => 'Block 31',
                    '32' => 'Block 32',
                    '33' => 'Block 33',
                    '34' => 'Block 34',
                    '35' => 'Block 35'
                );
                echo form_dropdown('blockposition', $options, set_value('countryid', (isset($blockinfomation->WidgetPosition) ? $blockinfomation->WidgetPosition : ''), TRUE), array('class' => 'form-control'));
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Block Content</label>

            <div class="col-md-7">
            </div>
            <div class="col-md-12">
                <?php
                $data = array(
                    'name' => 'blockcontent',
                    'id' => 'wysiwyg',
                    'class' => 'form-control',
                    'rows' => '20',
                    'value' => (isset($blockinfomation->BlockContent) ? $blockinfomation->BlockContent : '')
                );

                echo form_textarea($data);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-1">Is Active?</label>

            <div class="col-lg-5">
                <label class="radio-inline">
                    <input type="radio" name="block_is_active" value="1" <?php echo set_value('block_is_active', (isset($blockinfomation->isActive) ? $blockinfomation->isActive : '')) == 1 ? "checked" : ""; ?>>Active
                </label>
                <label class="radio-inline">
                    <input type="radio" name="block_is_active" value="0" <?php echo set_value('block_is_active', (isset($blockinfomation->isActive) ? $blockinfomation->isActive : '')) == 0 ? "checked" : ""; ?>>Deactive
                </label>
            </div>
        </div>
        <div class="form-group">
            <input id="addBlockBtn" class="btn btn-success" value="Save Changes" type="submit">
            <input class="btn btn-default" value="Cancel" type="reset">
            <button type="button" class="btn btn-default" data-dismiss="modal">
                Close
            </button>
        </div>
        <?php echo form_close(); ?>
        <?php echo form_end_divs(); ?>
    </div>
    <div class="col-md-5 col-xs-5 col-sm-12">
        <div class="row widgetboxes">
            <?php echo form_start_divs($title, 'block manager'); ?>
            <?php foreach ((array) $blocks as $block): ?>
                <?php //owndebugger( $block); ?>
                <?php if (isset($block)) { ?>
                    <div class="col-md-12 widgetblocks">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?php echo(isset($block['BlockTitle']) ? $block['BlockTitle'] : ''); ?>
                                <span
                                    class="pull-right"><?php echo(isset($block['WidgetPosition']) ? 'Widget Position: ' . $block['WidgetPosition'] : ''); ?></span>
                            </div>
                            <div class="panel-body">
                                <?php if (isset($block['BlockId'])) { ?>
                                    <?php __e($block['BlockContent']); ?>
                                    <?php //__e(htmlspecialchars($block['BlockContent'])); ?>
                                <?php } ?>
                                <?php if (!empty($block['BlockUniqueId'])) { ?>
                                    <pre>__block($block<?php echo $block['BlockId']; ?>)</pre>
                                <?php } ?>
                            </div>
                            <div class="panel-footer">

                                <?php if (isset($block['BlockId'])) { ?>
                                    <a href="<?php echo base_url(); ?>blockmanager/<?php __e($block['BlockId']); ?>" class="btn btn-success btn-xs">
                                        <span class="fa fa-pencil"></span>
                                    </a>
                                <?php } ?>
                                <?php if (isset($block['BlockId'])) { ?>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-xs"
                                       onclick="ajaxRemoveFn(<?php __e($block['BlockId']); ?>, 'deleteblock/<?php __e($block['BlockId']); ?>')">
                                        <span class="fa fa-times"></span>
                                    </a>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php endforeach; ?>
            <?php echo form_end_divs(); ?>
        </div>
    </div>
</div>
