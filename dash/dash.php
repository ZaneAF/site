<?php session_start();
if(!isset($_SESSION["email"]) && !isset($_SESSION["password"])){
    header("Location: http://localhost/test/auth.php");
    }

require_once("../php/dbconnect.php");
error_reporting(E_ERROR | E_PARSE);
$email = $_SESSION["email"];
$res = $mysqli->query("SELECT * FROM `users` WHERE email = '".$email."'" );
$rowa = mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashbord</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->


    <!-- Customized Bootstrap Stylesheet -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user me-2"></i>#placehold</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">

                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Главная</a>
                    <a href="../php/logout.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Выйти</a>
                </div>
            </nav>
        </div>
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>     
            </nav>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-box fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Имя</p>
                                <h6 class="mb-0"><?php print($rowa['name'])?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-border-style fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">E-Mail</p>
                                <h6 class="mb-0"><?php print($rowa['email'])?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-border-style fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Направление</p>
                                <h6 class="mb-0"><?php if ($rowa['type'] == "eco")
                                {print("Экономика");}
                                 else 
                                    print("Информационные технологии") ;?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-border-style fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Курс</p>
                                <h6 class="mb-0"><?php print($rowa['age'])?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Доступные курсы</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Номер</th>
                                    <th scope="col">Название</th>
                                    <th scope="col">Время на изучение, в часах </th>
                                    <th scope="col">Ссылка</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php 
                                $interest = $rowa['interest'];
                                $resa = $mysqli->query("SELECT * FROM ai" ); 
                                foreach ($resa as $row): ?>
		                        <tr>
			                    <td><?php echo $row['id_test']; ?></td>
			                    <td><?php echo $row['name']; ?></td>
			                    <td><?php echo $row['time']; ?></td>
			                    <td><?php print($row['link']); ?></td>
		                        <?php endforeach; ?>
		                        </tr>
		                        
		                        
		                        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Доступные тесты</h6>
                    </div>
            <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Название</th>
                                    <th scope="col">Статус</th>
                                    <th scope="col">Тест</th>
                                </tr>
                            </thead>
                            <tbody>
		                        
		                        <tr><td> <a href="tour1.php">Вводный урок</a></td>  
                                 <?php
                                 $rest = $mysqli->query("SELECT * FROM ai where id_test = '2'");
                                 $ro = mysqli_fetch_array($rest, MYSQLI_ASSOC);
                                if($ro['complete'] == 0){?><td> Не выполнен</td>        
		                        <td><a class="btn btn-sm btn-primary" href="quiz/index.php">Пройти тест</a></td>
                            <?php }else{ ?>
                                <td>Выполнен</td>        
                                <td>Уже выполнен</td>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                    </div>

            
        </div>
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Template Javascript -->
    <script src="assets/js/main.js"></script>
</body>

</html>