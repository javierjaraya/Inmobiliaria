<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
    <head>
        <title>Ejemplo TinyMCE</title>
        <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
    </head>

    <body>
        <div id="sample">
            <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
            //<![CDATA[
            bkLib.onDomLoaded(function () {
                nicEditors.allTextAreas()
            });
            //]]>
            </script>
            <h4>
                First Textarea
            </h4>
            <textarea name="area1" cols="40">
            </textarea><br />
            <h4>
                Second Textarea
            </h4>
            <textarea name="area2" style="width: 100%;">
       Some Initial Content was in this textarea
            </textarea><br />
            <h4>
                Third Textarea
            </h4>
            <textarea name="area3" style="width: 300px; height: 100px;">
       HTML content default in textarea
            </textarea>
        </div>
    </body>
</html>