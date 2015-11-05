<script src="js/jquery-2.1.3.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<!-- polyfiller file to detect and load polyfills -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script>
    webshims.setOptions('waitReady', false);
    webshim.setOptions('forms-ext', {
        replaceUI: 'auto',
        types: 'date time',
        widgets: {
            startView: 2
        }
    });
    webshim.polyfill('forms forms-ext');
//]]>  
    webshims.polyfill('forms forms-ext');
</script>

<style type='text/css'>
    .wrapper {
        margin: 10px auto;
        padding: 5px 10px;
        max-width: 600px;
        min-width: 300px;
        width: 90%;
    }
    .form-row {
        padding: 10px;
    }
    label {
        display: block;
        margin: 3px 0;
    }
    .form-row input {
        width: 220px;
        padding: 3px 1px;
    }
    .date-time input[type="date"] {
        width: 130px;
    }
    .date-time input[type="time"] {
        width: 85px;
    }

</style>