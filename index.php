<!DOCTYPE html>
<html>
<head>
    <title>Mike's TODO-List</title>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" media="all" charset="utf-8" href="css/styles.css" />
    <link rel="stylesheet" type="text/css" media="all" charset="utf-8" href="css/main.css" />
    <link rel="stylesheet" type="text/css" media="all" charset="utf-8" href="css/kalendae.css" />

    <script type="text/javascript" charset="utf-8" src="js/jquery-1-11-1.js"></script>
    <script type="text/javascript" charset="utf-8" src="js/kalendae.js"></script>
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
                var isclick = 0;
                $(document).ready(function(){
                    $("#add-task").click(function(){
                        if (isclick == 0) {
                            $("#editor").show();
                            $("#add-task").val("取消添加");
                            isclick = 1;
                        }else{
                            $("#editor").hide();
                            isclick = 0;
                            $("#add-task").val("添加新任务");
                        }
                    });
                });
                </script>
                <?php
                require_once('config.php');
                $link = mysql_connect($MYSQL_URL, $MYSQL_USER, $MYSQL_PASSWORD);
                if (!$link) {
                    die('Could not connect: ' . mysql_error());
                }
                $db_selected = mysql_select_db('todolist', $link);
                if (!$db_selected) {
                    die ('Can\'t use foo : ' . mysql_error());
                }
                $res = mysql_query('select count(*) as sum from todolist;');
                $info = mysql_fetch_array($res);
                $total = $info['sum'];
                ?>
                <div class="todolist-status-sum">待完成任务数为：<?php echo $total;?></div>
                <div class="todolist-status-editor" id="editor" style="display:none">
                    <center>
                        <form class="form" method="POST" action="addtask.php">
                            <p class="type">
                                <label for="type">任务分级<span>：</span></label>
                                <input type="text" name="type" id="type" />
                            </p>
                            <p class="deadline">
                                <label for="deadline">截止时间<span>：</span></label>
                                <input type="text" readonly="readonly" class="auto-kal" id="deadline" name="deadline">
                            </p>
                            <label>任务简述<span>：</span></label>
                            <p class="context">
                                <textarea name="content"></textarea>
                            </p>
                            <p class="submit">
                                <input type="submit" class="button gray" value="提交任务" />
                            </p>
                        </form>
                    </center>
                </div>
            </div>
            <div id="todolist-table">
                <?php
                $result = mysql_query('select * from todolist;');
                if (!$result) {
                    die('Invalid query: ' . mysql_error());
                }
                while($row = mysql_fetch_array($result)){
                    echo "<div class=\"plan "."plan".rand(1,8)."\">";
                    echo "<div class=\"type\">".$row['type']."</div>";
                    echo "<div class=\"deadline\">".$row['deadline']."</div>";
                    echo "<div class=\"container\">";
                    echo "<div class=\"content\">";
                    echo $row['content'];
                    echo "</div>";
                    echo "</div>";
                    echo "<a class=\"finish\" href=\"finishtask.php?task-id=".$row['id']."\">finish</a>";
                    echo "</div>";
                }
                ?>
            </div>
        </header>
        <!-- end header -->
    </div>
</body>
</html>