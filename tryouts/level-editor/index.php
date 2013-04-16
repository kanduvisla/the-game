<!DOCTYPE html>
<html>
<head>
	<title></title>
    <style type="text/css">
        html {
            background: #000;
            color: #fff;
        }
        #map, #tiles {
            border-spacing: 0;
            border-collapse: collapse;
        }
        #map td, #tiles td {
            width: 32px;
            height: 32px;
            border: 1px solid #333;
        }
        span.tile {
            display: block;
            width: 16px;
            height: 16px;
            zoom: 2;
            cursor: pointer;
        }
        #tiles span.tile {
            zoom: 4;
        }

        #tiles td.active {
            outline: 1px solid #fff;
        }
    </style>
</head>
<body>
	Level editor

	<table id="map">
        <?php
            for($y=0; $y<9; $y++)
            {
                echo '<tr>';
                for($x=0; $x<9; $x++)
                {
                    printf('<td data-x="%s" data-y="%s" data-tile=""></td>', $x, $y);
                }
                echo '</tr>';
            }
        ?>
	</table>

    Tiles:
    <table id="tiles">
        <?php
            $jsonFiles = glob('tiles/*.json');
            foreach($jsonFiles as $tileset)
            {
                echo '<tr>';
                $data = array_pop(json_decode(file_get_contents($tileset), true));
                foreach($data['tiles'] as $tile)
                {
                    printf('
                        <td>
                            <span class="tile" data-tile="%s" style="%s"></span>
                        </td>
                    ',
                    $data['collection'].'-'.$tile['type'],
                    'background: url(tiles/'.$data['map'].') -'.($tile['x']*16).'px -'.$tile['y'].'px;'
                    );
                }
                echo '</tr>';
            }

        ?>
    </table>

    Output:
    <button id="save">Output JSON</button>

	<script type="text/javascript" src="zepto.min.js"></script>
	<script type="text/javascript">
        // Used Zepto for rapid prototyping:
        $(function(){
            // Map drawing:
            var activeTile;
            var mouseDown = false;
            $('#tiles span').click(function(){
                $('#tiles td').removeClass('active');
                $(this).parent().addClass('active');
                activeTile = $(this);
            });
            $('#map').mousedown(function(){
                mouseDown = true;
            }).mouseup(function(){
                mouseDown = false;
            }).mouseleave(function(){
                mouseDown = false;
            });
            $('#map td').mousemove(function(){
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

            // JSON Outputting:
            $('#save').click(function(){
                var json = {"tiles": []};
                $('#map td').each(function(){
                    var tile = {
                        "x" : this.getAttribute('data-x'),
                        "y" : this.getAttribute('data-y'),
                        "tile" : $('span', this).attr('data-tile')
                    };
                    json.tiles.push(tile);
                });
                console.log(json);
            });
        });
	</script>
</body>
</html>