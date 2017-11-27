<div id="sb-search" class="sb-search">
    <form role="search" method="POST" id="cse-search-box" action="./tim-kiem.html">
        <input class="sb-search-input" placeholder="Nhập từ khóa, phân biệt chữ hoa chữ thường..." name="key" id="q"
               type="text">
        <input type="hidden" name="from" value=""/>
        <input type="hidden" name="to" value=""/>
        <input class="sb-search-submit" value="" type="submit">
        <span class="sb-icon-search"></span>
    </form>
</div>
<script src="./contents/skin/frontend/default/js/classie.js"></script>
<script src="./contents/skin/frontend/default/js/uisearch.js"></script>
<script>
    new UISearch(document.getElementById('sb-search'));
</script>
<div class="clear"></div>