$(function(){
    function storeSpriteData()
    {
        var data = [];
        $('#sprite td').each(function(){
            var tile = $('span.tile', this);
            if(tile.length == 0)
            {
                data.push('-');
            } else {
                data.push(tile.attr('data-color'));
            }
            $('textarea').val(data.join(';'));
        });
    }

    // Map drawing:
    var activeTile;
    var mouseDown = false;
    $('#colors span').click(function(){
        $('#colors td').removeClass('active');
        $(this).parent().addClass('active');
        activeTile = $(this);
    });
    $('#sprite').mousedown(function(){
        mouseDown = true;
    }).mouseup(function(){
        mouseDown = false;
        storeSpriteData();
    }).mouseleave(function(){
        mouseDown = false;
        storeSpriteData();
    });
    $('#sprite td').mousemove(function(){
        if(activeTile && mouseDown)
        {
            $(this).html(activeTile.clone());
        }
    }).click(function(){
        if(activeTile)
        {
            $(this).html(activeTile.clone());
        }
    });
});