<link rel="stylesheet" href="css/sidebar.css">

<header class="header">
    <div class="header_in">
        <button type="button" class="menu" id="menu">
            <span></span>
        </button>
    </div>
</header>

<div class="sidebar" id='sidebar'>
    <ul>
        <li><a href="index.php">Dashboard</a></li>
        <li><a href="Logs.php">Logs</a></li>
    </ul>
</div>
<script>
    //Menu
    var btn = document.querySelector('.menu');
    var test = true;
    btn.onclick = function() {
        if(test == true) {
            document.querySelector('.menu span').classList.add('menu');
            document.getElementById('sidebar').classList.add('sidebarshow');
            test = false;
        }else if(test == false) {
            document.querySelector('.menu span').classList.remove('menu');
            document.getElementById('sidebar').classList.remove('sidebarshow');
            test = true;
        }
    }
</script>
