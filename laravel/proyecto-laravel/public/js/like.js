'use strict'
const base_url = 'http://proyecto-laravel.devel/';

$('.btn-like').css('cursor', 'pointer');
$('.btn-dislike').css('cursor', 'pointer');

function like() {
    $('.btn-like').unbind('click').click(function() {
        console.log('like!!!');
        $(this).addClass('btn-dislike').removeClass('btn-like');
        $(this).attr('src', base_url + 'img/red-heart.png');
        
        $.ajax({
            url: base_url + 'like/' + $(this).data('id'),
            type: 'GET',
            success: function(response) {
                console.log(response);
            }
        });

        dislike();
    });
}
like();

function dislike() {
    $('.btn-dislike').unbind('click').click(function() {
        console.log('dislike!!!');
        $(this).addClass('btn-like').removeClass('btn-dislike');
        $(this).attr('src', base_url + 'img/gray-heart.png');

        $.ajax({
            url: base_url + 'dislike/' + $(this).data('id'),
            type: 'GET',
            success: function(response) {
                console.log(response);
            }
        });

        like();
    });
}
dislike();
