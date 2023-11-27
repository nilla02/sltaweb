<x-admin-master>


    @section('content')

    <?php
    $invoice = 1;
    $tranid = 4;
    ?>
    <form action="https://merchants.4csonline.com/DevTranSvcs/tp.aspx" target="iframe" id="myForm" method="post">
        <input type="hidden" name="MERCHKEY" value="BOSL_30087497">
        <input type="hidden" name="TRANTYPE" value="AUTH">
        <input type="hidden" name="AMT" value="55.00">
        <input type="hidden" name="CURR" value="XCD">
        <input type="hidden" name="INVOICE" value="<?php echo $invoice; ?>">
        <input type="hidden" name="TRANID" value="<?php echo $tranid ?>">
        <input type="hidden" name="URLAPPROVED" value="http://127.0.0.1/form/accept.php">
        <input type="hidden" name="URLOTHER" value="http://127.0.0.1/form/failed.php">
        <input type="hidden" name="SUBMIT" value="Pay Now">
    </form>
    <iframe name="iframe" src="https://merchants.4csonline.com/DevTranSvcs/tp.aspx" height="230" width="460" title="Iframe Example"></iframe>
    <script type="text/javascript">
        function submitform() {
            document.forms["myForm"].submit();
        }
        submitform();
        var rte = 0;
        var intervalID = window.setInterval(myCallback, 1);

        function myCallback() {
            rte += 1;
            console.log(rte);
        }
    </script>

    @endsection


    </x-home-master>