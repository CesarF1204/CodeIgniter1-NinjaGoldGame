<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ninja Money</title>
	<link rel="stylesheet" href="user_guide/css/style.css">
</head>
<body>
	    <h1>Your Gold : 
            <span><?= $this->session->userdata('earned_gold') ?></span>
        </h1>
        <!-- Farm -->
            <form action="/process" method="post">
                <h3>Farm</h3>
                <p>(earns 10-20 golds)</p>
                <input type="hidden" name="action" value="farm">
                <input type="submit" value="Find Gold!"/>
            </form>
        <!-- Cave -->
            <form action="/process" method="post">
                <h3>Cave</h3>
                <p>(earns 5-10 golds)</p>
                <input type="hidden" name="action" value="cave">
                <input type="submit" value="Find Gold!"/>
            </form>
        <!-- House -->
            <form action="/process" method="post">
                <h3>House</h3>
                <p>(earns 2-5 golds)</p>
                <input type="hidden" name="action" value="house">
                <input type="submit" value="Find Gold!"/>
            </form>
        <!-- Casino -->
            <form action="/process" method="post">
                <h3>Casino</h3>
                <p>(earns/takes 0-50 golds)</p>
                <input type="hidden" name="action" value="casino">
                <input type="submit" value="Find Gold!"/>
            </form>
        <!-- History -->
        <p class='activities'>Activities:</p>
        <div class='history'>
            <?= $this->session->userdata('history') ?>
        </div>
</body>
</html>