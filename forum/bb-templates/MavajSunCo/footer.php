<div id="simplediv" 
     style="
     background-color:white; 
     border-radius: 5px; 
     border:1px solid #00C4FF;
     display:none;
     width:800px;
     height:400px; 
     overflow: auto; 
     position: fixed; 
     top:100px;">
    Click anywhere in the document to auto-close me
</div>


<p>
    We like to Talk. Just post a question and get advice and guidance from our team. 
    Please click <a href="#" onclick="Popup.showModal('modal',null,null,{'screenColor':'#6D6E70','screenOpacity':.6});return false;">here</a>  to see our Forum guidelines.
</p>

</div> 
</div>

<div id="footer" role="contentinfo">

    <?php
    global $bbdb;
    printf(
            __('This page generated in %s seconds, using %d queries.'), bb_number_format_i18n(bb_timer_stop(), 2), bb_number_format_i18n($bbdb->num_queries)
    );
    ?>
</p> 

</div>


<?php do_action('bb_foot'); ?>

</body>
</html>
