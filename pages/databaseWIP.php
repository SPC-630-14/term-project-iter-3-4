<!-- Admin Only Page -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up!</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootsthapcdn.com/bootsthap/3.4.0/css/bootsthap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootsthapcdn.com/bootsthap/3.4.0/js/bootsthap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/databaseMaintain/databaseWIP.css"> 
  </head>

  <body>
    <div>
      <div class="container">
        <h1>Pain</h1>
        <h3>Suffering</h3>
        <form method="post" action="databaseWIP.php">
          <div class="form-group">
            <button
              type="submit"
              class="btn btn-info"
              name="button"
              value="create"
            >
              Create
            </button>
          </div>
          <div class="form-group">
            <button
              type="submit"
              class="btn btn-info"
              name="button"
              value="insert"
            >
              Insert
            </button>
          </div>
          <div class="form-group">
            <button
              type="submit"
              class="btn btn-info"
              name="button"
              value="show"
            >
              Show
            </button>
          </div>
          <div class="form-group">
            <button
              type="submit"
              class="btn btn-info"
              name="button"
              value="drop"
            >
              Drop
            </button>
          </div>
          <div class="form-group">
            <button
              type="submit"
              class="btn btn-info"
              name="button"
              value="reset"
            >
              Reset
            </button>
          </div>
          <br>
        </form>
        <br>
        <form method="post" action="dbMaintain.php">
          <select name="action">
            <option selected disabled hidden>Choose Option</option>
            <option value="select">Select</option>
            <option value="insert">Insert</option>
            <option value="modify">Modify</option>
            <option value="delete">Delete</option>
            
          </select>
          <br>
          <button name= "specialButton" type="submit" value="rel">Continue</button>
        </form>
      </div>
      <!-- I will fix it later -->
      <div style="text-align: center; float:right;">
        <!--PHP-->
        <?php
            include ("../php/sqlFunctions.php");


            if (isset($_POST['specialButton'])) {
                if ($_POST['action'] == "select") {
                  echo "<script>window.location.href = 'select.php' </script>";
                  exit;
                }
                if ($_POST['action'] == "insert") {
                  echo "<script>window.location.href = 'insert.php' </script>";
                  exit;
                }
                if ($_POST['action'] == "modify") {
                  echo "<script>window.location.href = 'update.php' </script>";
                  exit;
                }
                if ($_POST['action'] == "delete") {
                  echo "<script>window.location.href = 'delete.php' </script>";
                  exit;
                }
            }



            if (isset($_POST['button'])) {
              switch ($_POST['button']) {
                case "create":
                  include ('../php/createTables.php');
                  generalQuery($createTables);
                  break;
                case "insert":
                  include ('../php/insertTables.php');
                  generalQuery($insertAddress);
                  generalQuery($insertUser);
                  generalQuery($insertTruck);
                  generalQuery($insertManufacturer);
                  generalQuery($insertStore);

                  generalQuery($insertItemChairs);
                  generalQuery($insertItemTables);
                  generalQuery($insertItemSofas);

                  generalQuery($insertItemDrawers);
                  generalQuery($insertItemLamps);
                  generalQuery($insertItemChargers);

                  generalQuery($insertItemBedFrames);
                  generalQuery($insertItemMattresses);
                  generalQuery($insertItemNightStands);

                  generalQuery($insertItemMirrors);
                  generalQuery($insertItemSinks);
                  generalQuery($insertItemBins);

                  generalQuery($insertCards);
                  generalQuery($insertAssembly);
                  generalQuery($insertReview);
                  break;
                case "show":
                  include ('../php/showTables.php');
                  showQuery($showTables);
                  break;
                case "drop":
                  include ('../php/dropTables.php');
                  generalQuery($dropTables);
                  break;
                case "reset":
                  include ('../php/dropTables.php');
                  generalQuery($dropTables);
                  include ('../php/createTables.php');
                  generalQuery($createTables);
                  include ('../php/insertTables.php');
                  generalQuery($insertAddress);
                  generalQuery($insertUser);
                  generalQuery($insertTruck);
                  generalQuery($insertManufacturer);
                  generalQuery($insertStore);

                  generalQuery($insertItemChairs);
                  generalQuery($insertItemTables);
                  generalQuery($insertItemSofas);

                  generalQuery($insertItemDrawers);
                  generalQuery($insertItemLamps);
                  generalQuery($insertItemChargers);

                  generalQuery($insertItemBedFrames);
                  generalQuery($insertItemMattresses);
                  generalQuery($insertItemNightStands);

                  generalQuery($insertItemMirrors);
                  generalQuery($insertItemSinks);
                  generalQuery($insertItemBins);
                  generalQuery($insertCards);
                  generalQuery($insertAssembly);
                  generalQuery($insertReview);
                  break;
              }
            }

            else {
                exit;
            }
          ?>
      </div>
    </div>
  </body>
</html>
