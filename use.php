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

        <div class="user-profile">
          <div class="user-profile-pic"></div>
          <div class="user-profile-name"></div>
        </div>
        <div class="user-profile">
          <div class="user-profile-pic"></div>
          <div class="user-profile-name"></div>
        </div>
        <div class="user-profile">
          <div class="user-profile-pic"></div>
          <div class="user-profile-name"></div>
        </div>
        <div class="user-profile">
          <div class="user-profile-pic"></div>
          <div class="user-profile-name"></div>
        </div>
        <div class="user-profile">
          <div class="user-profile-pic"></div>
          <div class="user-profile-name"></div>
        </div>
        <div class="user-profile">
          <div class="user-profile-pic"></div>
          <div class="user-profile-name"></div>
        </div>
        <div class="user-profile">
          <div class="user-profile-pic"></div>
          <div class="user-profile-name"></div>
        </div>

      </div>
    </div>

    <div class="content">
      <!-- Something -->
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

  </script>
</body>

</html>