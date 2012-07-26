;$(document).ready(function() {
    var post_id = parseInt($('.post').attr('id'));
 
    load_comments(CI.site_url('comments/index/'+post_id)); 
    load_comment_form(post_id);

    $('#comments .pagination a').live('click', function() {
       var $this = $(this); 
       load_comments($this.attr('href'));
       
       return false;
    });

    $('#comment-form form').live('submit', function() {
       var $this = $(this);

       $.ajax({
           url: $this.attr('action'),
           type: 'POST',
           dataType: 'JSON',
           data: $this.serialize(),
           success: function(response) {
               if (response.status == CI.STATUS_SUCCESS) {
                   load_comments(CI.site_url('comments/index/'+post_id));
                   load_comment_form(post_id);
               } else {
                   $('#comment-form').html(response.data.html);
               }
           }
       });
       
       return false;
    });
});

function load_comments(url) {
    $.ajax({
       url: url + '?' + Math.random(),
       type: 'GET',
       success: function(response) {
           $('#comments').html(response);
       }
    });
}

function load_comment_form(post_id) {
    $.ajax({
         url: CI.site_url('comments/create/'+post_id),
         type: 'GET',
         dataType: 'JSON',
         success: function(response) {
             $('#comment-form').html(response.data.html);
         }
    });
}