<?php
require_once 'config.php';

$loggedId = $_GET['loggedPersonId'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE id =?;");
$stmt->execute([$loggedId]);
$me = $stmt->fetch();


$get = $pdo->prepare("SELECT * FROM users;");
$get->execute();
$allUsers = $get->fetchAll();
if ($me && $allUsers) {
  ?>

  <!doctype html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SoSoft</title>
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

            //Generating user profiles
            foreach ($allUsers as $user) {
              echo "<div class='user-profile'>
                  <div class='user-profile-pic'> <img src='" . $user['profile_picture'] . "' alt='".$user['userName']."'> </div>
                  <div class='user-profile-name'><strong>".$user['userName']."</strong></div>
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
          
        </div>
        <div class="check text-success">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. At magnam porro nisi nemo repellat placeat deserunt
          error aspernatur enim unde exercitationem modi earum sunt nostrum assumenda deleniti totam, impedit quos cum
          minus facilis in veniam fuga! Quia possimus, adipisci earum quis expedita culpa molestiae labore harum a! Illum,
          corporis? Cum quasi porro doloremque nostrum voluptate nemo blanditiis facere provident, fugit expedita commodi
          odit natus iusto quaerat, delectus possimus aliquid ducimus sit molestiae qui. Consequuntur molestiae sequi
          ullam delectus inventore, facere nostrum rem est minima eum temporibus odit repellendus quas aspernatur dolor?
          Earum nihil, itaque ad beatae ea repellat fuga, praesentium eos sint quam voluptas rerum laborum harum
          voluptatem architecto. Impedit cupiditate, odit commodi fuga unde labore dignissimos! Perspiciatis optio illo
          culpa magnam dignissimos nihil alias atque, similique incidunt eaque. Enim molestias quis, corrupti dolores
          perspiciatis debitis inventore! Commodi, inventore. Neque ut illum debitis laborum consequuntur praesentium
          consequatur iusto nemo, corporis quae quidem minus tenetur perferendis assumenda non magnam error repellat sit
          culpa commodi, tempora a. Debitis commodi nemo dignissimos velit, explicabo quis totam repellendus, doloribus
          dolores eveniet maiores soluta porro quod nihil, voluptatum ea delectus dolor! Vitae quas ab inventore
          asperiores illo dolorum voluptas aliquid iure ex? Sequi, voluptatum ea laboriosam repellendus placeat quas
          deleniti delectus rem asperiores iusto nulla ex maiores, possimus corrupti sint nam. A quas obcaecati voluptate
          quidem, totam reprehenderit non perferendis eos praesentium, atque debitis alias laudantium corporis quos fuga
          rerum. Eaque mollitia corporis pariatur odio omnis inventore maiores possimus animi molestiae asperiores
          voluptates nesciunt perferendis, corrupti explicabo. Dolores corporis dignissimos accusamus autem animi quod
          mollitia exercitationem distinctio nihil eligendi quasi nisi rem officia adipisci aut, error nobis natus,
          officiis dolore possimus voluptas eaque inventore itaque libero. Voluptate cum veniam porro velit qui. Magnam
          nisi accusantium perferendis molestiae. Reiciendis adipisci suscipit eos accusamus consequatur rem? Fuga ab vero
          minima, accusamus delectus laudantium quis adipisci ipsum, consectetur repudiandae doloremque doloribus alias
          veniam sint soluta distinctio officiis. Deleniti maiores animi minima tempore perspiciatis aperiam voluptatibus
          dolor ipsum adipisci illum blanditiis molestiae aliquam quas hic esse voluptate eius optio, corporis repellendus
          quos fuga nobis mollitia ut praesentium! Aperiam perferendis labore fugit odit dolore possimus iusto,
          repellendus omnis aut dolorum ad ipsam provident numquam vero vel, dolor quae eligendi suscipit voluptatibus
          dolorem culpa sint temporibus! Odio adipisci hic accusamus quaerat eius animi perferendis fugiat quia porro
          earum nam voluptatibus, repellat qui id quae maxime, tempora fuga tenetur. Enim voluptate adipisci reprehenderit
          similique fugiat nulla esse illo ea, quos sed porro est commodi corporis quae dolor, ad laudantium ab vitae quis
          in inventore consequatur voluptatem repellat? Porro nihil, dolorem quam rerum provident ea tempore nisi animi
          nobis. Blanditiis, sapiente? Modi minus quo magnam suscipit laudantium neque maxime rerum ipsum. Optio eveniet
          alias accusamus eaque doloremque ipsam illo facere esse iusto earum, facilis veritatis at, aliquam nesciunt in
          deserunt culpa hic totam est. In perspiciatis numquam veniam facere expedita esse pariatur eveniet hic quos a
          quis, porro, similique iusto deserunt ab beatae sapiente quidem? Tenetur exercitationem fuga animi et officia
          deleniti, minima reiciendis cumque nihil fugiat tempora corrupti. Expedita facilis nihil, corrupti culpa
          distinctio quas ipsum necessitatibus doloribus nesciunt architecto, obcaecati alias voluptatum nobis et, at
          excepturi eaque quam quidem unde repellendus esse libero. Reprehenderit obcaecati similique quaerat expedita
          amet? Odit recusandae quam optio est. Commodi nulla corrupti alias optio incidunt! Tempore pariatur rem
          voluptatibus nisi animi, dolorem culpa laboriosam! Ratione reiciendis debitis vero aliquid nemo aliquam natus
          quos consequatur deserunt cumque molestiae aperiam commodi consectetur quo, animi mollitia repellat nihil omnis
          inventore vel accusantium suscipit, porro, magni assumenda. Provident, soluta mollitia explicabo quod
          voluptatibus doloribus officiis placeat accusamus ipsum consequuntur ut cumque illum possimus culpa vero optio.
          Laborum vitae, et fugiat repellat sequi sapiente repudiandae eaque ea officiis laboriosam harum quidem sed
          officia blanditiis quos deleniti! Suscipit cum ab enim dolor harum tenetur voluptates dolores sunt, illo porro
          natus quos dolorum modi earum eum tempore ut rerum possimus, minus debitis est officia. Distinctio, aperiam
          quasi nam adipisci voluptas vero consequuntur quod qui dolore minima deserunt illo aliquid cupiditate
          repellendus est commodi sunt sapiente magnam minus, necessitatibus sed eaque reprehenderit beatae a. Accusamus
          maiores itaque omnis quasi sed magni, dolorum, perspiciatis repudiandae dolores laboriosam dolore explicabo,
          modi unde culpa mollitia nesciunt? Adipisci!
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
<?php
} else {
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>

  <body>
    <h1>No Data Found</h1>
    <div><a href="index.php">Go To Home</a></div>
  </body>

  </html>

  <?php
}