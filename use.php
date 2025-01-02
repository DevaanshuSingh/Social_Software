<?php
require_once 'config.php';

$loggedId = $_GET['loggedPersonId'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE id =?;");
$stmt->execute([$loggedId]);
$me = $stmt->fetch();


$get = $pdo->prepare("SELECT * FROM users;");
$get->execute();
$allUsers = $get->fetchAll();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link rel="stylesheet" href="./css/main.css">
  <link rel="stylesheet" href="./css/use.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body>

  <div class="menu">
    <div class="menu-button">
      <i onclick="toggleMenu()" class="ri-arrow-right-circle-line menu-icon"></i>
    </div>
    <div class="inside-menu"></div>
  </div>

  <div class="container">
    <div class="users">
      <div class="show-user-profile-section">

        <?php
        try {
          for ($i = 0; $i < count($allUsers); $i++) {
            echo "<div class='user-profile'>
                  <div class='user-profile-pic'> <img src='' alt='CNAT'> </div>
                  <div class='user-profile-name'>CNAT</div>
              </div>";
          }
        } catch (PDOException $e) {
          echo "Error While Registering:<br>" . $e->getMessage();
        }
        ?>
        <!-- <div class='user-profile'>
          <div class='user-profile-pic'> <img src='' alt='CNAT'> </div>
          <div class='user-profile-name'>CNAT</div>
        </div>
        <div class='user-profile'>
          <div class='user-profile-pic'> <img src='' alt='CNAT'> </div>
          <div class='user-profile-name'>CNAT</div>
        </div> -->
      </div>
    </div>

    <div class="content">
      <div class="my-section">
        <div class="section search-post">
          <div class="input-here">
            <input type="text" placeholder="Search Post">
            <i class="ri-search-line search-icon"></i>
          </div>
        </div>
        <div class="section post"> <button>POST</button> </div>
        <div class="section my-profile image-fluid">
          <div class="my-name"><?php echo $me['fullName']; ?></div>
          <img src="<?php echo $me['profile_picture'] ?>" alt="<?php echo $me['fullName']; ?>">
          <div class="collapse-my-section"> <i onclick="toggleMySection()" class="collaps-icon ri-arrow-up-s-line"></i>
          </div>
        </div>
      </div>
      <div class="check">
      </div>
    </div>

  </div>

  <script>
    let isMenuOpen = true;
    function toggleMenu() {
      if (isMenuOpen === true) {
        // alert(`GRK Closing`);
        document.querySelector(".menu .menu-button").style.display = "hidden";
        document.querySelector(".menu").style.transition = "2s cubic-bezier(1, 7, 0.5, 5)";
        document.querySelector("body").style.gridTemplateColumns = "0 100%";
        document.querySelector("body").style.transition = "2s ease";
        document.querySelector(".menu-icon").style.transform = "rotate(0deg)";
        document.querySelector(".menu-icon").style.transition = "2s ease-out";
        isMenuOpen = false;
      } else {
        // alert(`GRK Opening`);
        document.querySelector(".menu").style.display = "flex";
        document.querySelector(".menu").style.transition = "2s ease-in";
        document.querySelector("body").style.gridTemplateColumns = "20% 80%";
        document.querySelector("body").style.transition = "2s ease";
        document.querySelector(".menu-icon").style.transform = "rotate(180deg)";
        document.querySelector(".menu-icon").style.transition = "2s ease";
        isMenuOpen = true;
      }
    }

    let isMySectionOpen = true;
    function toggleMySection() {
      if (isMenuOpen === true) {
        // alert(`GRK Closing`);
        document.querySelector(".my-section").style.height = "0";
        document.querySelector(".my-section").style.transition = "all 5s ease";
        isMenuOpen = false;
      } else {
        // alert(`GRK Opening`);
        document.querySelector(".menu").style.display = "flex";
        document.querySelector(".menu").style.transition = "2s ease-in";
        document.querySelector("body").style.gridTemplateColumns = "20% 80%";
        document.querySelector("body").style.transition = "2s ease";
        document.querySelector(".menu-icon").style.transform = "rotate(180deg)";
        document.querySelector(".menu-icon").style.transition = "2s ease";
        isMenuOpen = true;
      }
    }
  </script>
</body>

</html>