<!DOCTYPE html>
<html>
<head>
    <title>Mike's TODO-List</title>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="css/styles.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/main.css" media="all" />
    <script type="text/javascript" src="js/jquery-1-11-1.js"></script>
</head>
<body>
    <div class="container">
        <!-- todolist top bar -->
        <div class="todolist-top">
            <a href="http://www.mikecoder.net" target="_blank">AUTHOR'S WEBSITE @ http://mikecoder.net</a>
            <span class="right">
                <a href="#">
                    <strong>FORK ME ON GITHUB</strong>
                </a>
            </span>
            <div class="clr"></div>
        </div><!--/ todolist top bar -->
        <header>
            <h1><span>A HTML5 and CSS3 Style TODO-List</span>Mike's TODO-List</h1>
        </header>       
        <!-- start header here-->
        <header>
            <div class="todolist-status">
                <input type="button" class="button gray" id="add-task" value="添加新任务"></input> 
                <script type="text/javascript">
                $(document).ready(function(){
                    $("s").click(function(){
                        $("editor").hide();
                    });
                    $("#add-task").click(function(){
                        $("#editor").show();
                    });
                });
                </script>
                <div class="todolist-status-sum">待完成任务数为：<?php echo "10";?></div>
                <div class="todolist-status-editor" id="editor" style="display:none">
                    <center>
                        <form method="POST" action="addtask.php">
                            <table>
                                <tr><td>任务名称：</td><td><input name="task-name"></input></td></tr>
                                <tr><td>任务时间：</td><td><input name="task-deadline"></input></td></tr>
                                <tr><td>任务细节：</td><td><input name="task-content"></input></td></tr>
                                <tr><td>任务提交：</td><td><input type="submit"></input></td></tr>
                            </table>
                        </form>
                    </center>
                </div>
            </div>
            <div id="todolist-table">
                <?php
                for ($i=0; $i < 10; $i++) { 
                    echo "<div class=\"plan "."plan".rand(1,8)."\">";
                    echo "<div class=\"type\">Enterprise</div>";
                    echo "<div class=\"deadline\">2014-11-30</div>";
                    echo "<div class=\"container\">";
                    echo "<div class=\"content\">";
                    echo "你妹妹的";
                    echo "</div>";
                    echo "</div>";
                    echo "<a class=\"finish\" href=\"finishtask.php?task-id=1\">finish</a>";
                    echo "</div>";
                }
                ?>
            </div>
        </header>
        <!-- end header -->
    </div>
</body>
</html>