$('.btn-like').css('cursor', 'pointer');
$('.btn-dislike').css('cursor', 'pointer');

function like() {
    $('.btn-like').unbind('click').click(function() {
        console.log('like!!!');
        $(this).addClass('btn-dislike').removeClass('btn-like');
        $(this).attr('src', 'img/red-heart.png');
        dislike();
    });
}
like();

function dislike() {
    $('.btn-dislike').unbind('click').click(function() {
        console.log('dislike!!!');
        $(this).addClass('btn-like').removeClass('btn-dislike');
        $(this).attr('src', 'img/gray-heart.png');
        like();
    });
}
dislike();
