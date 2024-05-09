<div class="x_panel">
    <div class="x_title">
        <div class="col-sm-9"><h3>All Category</h3></div>
        <div class="clearfix"></div>
    </div>
    <div class="x_content" style="display: block;">
        <script>
            function allowDrop(ev) {
                ev.preventDefault();

            }

            function drag(ev) {
                ev.dataTransfer.setData("text", ev.target.id);
            }

            function drop(ev) {
                ev.preventDefault();
                var data = ev.dataTransfer.getData("text");
                ev.target.appendChild(document.getElementById(data));
            }
        </script>
        <?php echo category_list_html($categories); ?>
    </div>
</div>