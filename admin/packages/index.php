<?php
    require_once($_SERVER[DOCUMENT_ROOT]."/cfg/core.php");
    $db = new myDB();
    $db->connect();
    $packages = $db->getAllPackages();
    session_start();

    if(!isset($_SESSION['admin_login'])){
        header("Location: localhost:8080/admin");
        die();
    }
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">

  <title>Packages - Dance Studio Focus Admin Panel</title>

  <!-- Icons -->
  <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
  <link rel="shortcut icon" href="img/favicon.png">
  <link rel="apple-touch-icon" href="img/icon57.png" sizes="57x57">
  <link rel="apple-touch-icon" href="img/icon72.png" sizes="72x72">
  <link rel="apple-touch-icon" href="img/icon76.png" sizes="76x76">
  <link rel="apple-touch-icon" href="img/icon114.png" sizes="114x114">
  <link rel="apple-touch-icon" href="img/icon120.png" sizes="120x120">
  <link rel="apple-touch-icon" href="img/icon144.png" sizes="144x144">
  <link rel="apple-touch-icon" href="img/icon152.png" sizes="152x152">
  <link rel="apple-touch-icon" href="img/icon180.png" sizes="180x180">
  <!-- END Icons -->

  <!-- Stylesheets -->
  <!-- Bootstrap is included in its original form, unaltered -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Related styles of various icon packs and plugins -->
  <link rel="stylesheet" href="css/plugins.css">

  <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
  <link rel="stylesheet" href="css/main.css">

  <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

  <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
  <link rel="stylesheet" href="css/themes.css">
  <!-- END Stylesheets -->

  <!-- Modernizr (browser feature detection library) -->
  <script src="js/vendor/modernizr-3.3.1.min.js"></script>
</head>

<body>
  <!-- Page Wrapper -->
  <!-- In the PHP version you can set the following options from inc/config file -->
  <!--
            Available classes:

            'page-loading'      enables page preloader
        -->
  <div id="page-wrapper" class="page-loading">
    <!-- Preloader -->
    <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
    <!-- Used only if page preloader enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
    <div class="preloader">
      <div class="inner">
        <!-- Animation spinner for all modern browsers -->
        <div class="preloader-spinner themed-background hidden-lt-ie10"></div>

        <!-- Text for IE9 -->
        <h3 class="text-primary visible-lt-ie10"><strong>Loading..</strong></h3>
      </div>
    </div>
    <!-- END Preloader -->

    <!-- Page Container -->
    <!-- In the PHP version you can set the following options from inc/config file -->
    <!--
                Available #page-container classes:

                'sidebar-light'                                 for a light main sidebar (You can add it along with any other class)

                'sidebar-visible-lg-mini'                       main sidebar condensed - Mini Navigation (> 991px)
                'sidebar-visible-lg-full'                       main sidebar full - Full Navigation (> 991px)

                'sidebar-alt-visible-lg'                        alternative sidebar visible by default (> 991px) (You can add it along with any other class)

                'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
                'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar

                'fixed-width'                                   for a fixed width layout (can only be used with a static header/main sidebar layout)

                'enable-cookies'                                enables cookies for remembering active color theme when changed from the sidebar links (You can add it along with any other class)
            -->
    <div id="page-container" class="header-fixed-top sidebar-visible-lg-full sidebar-light">
      <!-- Alternative Sidebar -->
      <div id="sidebar-alt" tabindex="-1" aria-hidden="true">
        <!-- Toggle Alternative Sidebar Button (visible only in static layout) -->
        <a href="javascript:void(0)" id="sidebar-alt-close" onclick="App.sidebar('toggle-sidebar-alt');"><i class="fa fa-times"></i></a>

        <!-- Wrapper for scrolling functionality -->
        <div id="sidebar-scroll-alt">
          <!-- Sidebar Content -->
          <div class="sidebar-content">
            <!-- Sidebar Section -->
            <div class="sidebar-section">
              <h2 class="text-light">Header</h2>
              <p>Section content..</p>
            </div>
            <!-- END Sidebar Section -->
          </div>
          <!-- END Sidebar Content -->
        </div>
        <!-- END Wrapper for scrolling functionality -->
      </div>
      <!-- END Alternative Sidebar -->

      <!-- Main Sidebar -->
      <div id="sidebar">
        <!-- Sidebar Brand -->
        <div id="sidebar-brand" class="themed-background">
          <a href="#" class="sidebar-title">
                            <img src="img/logo.png" alt="logo"> <span class="sidebar-nav-mini-hide"><strong>Focus</strong> Studio</span>
                        </a>
        </div>
        <!-- END Sidebar Brand -->

        <!-- Wrapper for scrolling functionality -->
        <div id="sidebar-scroll">
          <!-- Sidebar Content -->
          <div class="sidebar-content">
            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
              <li>
                <a href="clients"><i class="gi gi-parents fa fa-cog sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Clients</span></a>
              </li>
              <li>
                <a href="teachers"><i class="gi gi-woman fa fa-cog sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Teachers</span></a>
              </li>

              </li>
              <li class="sidebar-separator">
                <i class="fa fa-ellipsis-h"></i>
              </li>

              <li>
                <a href="classes"><i class="gi gi-heart fa fa-cog sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Classes</span></a>

              </li>
              <li>
                <a href="#"><i class="gi gi-inbox  fa fa-cog sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Packages</span></a>
              </li>
            </ul>
            <!-- END Sidebar Navigation -->
          </div>
          <!-- END Sidebar Content -->
        </div>
        <!-- END Wrapper for scrolling functionality -->

        <!-- Sidebar Extra Info -->
        <div id="sidebar-extra-info" class="sidebar-content sidebar-nav-mini-hide">

          <div class="text-center">
            <small>Crafted with <i class="fa fa-heart text-danger"></i> by <a href="#" target="_self">Arman and Madina</a></small><br>
            <small><span id="year-copy"></span> &copy; <a href="#" target="_self">Focus</a></small>
          </div>
        </div>
        <!-- END Sidebar Extra Info -->
      </div>
      <!-- END Main Sidebar -->

      <!-- Main Container -->
      <div id="main-container">
        <!-- Header -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!--
                        Available header.navbar classes:

                        'navbar-default'            for the default light header
                        'navbar-inverse'            for an alternative dark header

                        'navbar-fixed-top'          for a top fixed header (fixed main sidebar with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                            'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                        'navbar-fixed-bottom'       for a bottom fixed header (fixed main sidebar with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                            'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
                    -->
        <header class="navbar navbar-inverse navbar-fixed-top">
          <!-- Left Header Navigation -->
          <ul class="nav navbar-nav-custom">
            <!-- Main Sidebar Toggle Button -->
            <li>
              <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                                    <i class="fa fa-ellipsis-v fa-fw animation-fadeInRight" id="sidebar-toggle-mini"></i>
                                    <i class="fa fa-bars fa-fw animation-fadeInRight" id="sidebar-toggle-full"></i>
                                </a>
            </li>
            <!-- END Main Sidebar Toggle Button -->


          </ul>
          <!-- END Left Header Navigation -->

          <!-- Right Header Navigation -->
          <ul class="nav navbar-nav-custom pull-right">
            <!-- Search Form -->
            <!-- <li>
                                <form action="index.html" method="post" class="navbar-form-custom" role="search">
                                    <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Search..">
                                </form>
                            </li> -->
            <!-- END Search Form -->

            <!-- User Dropdown -->
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="img/placeholders/avatars/avatar.jpg" alt="avatar">
                                </a>
              <ul class="dropdown-menu dropdown-menu-right">
                <li class="dropdown-header">
                  <strong>ADMINISTRATOR</strong>
                </li>
                <li>
                  <a href="javascript:void(0)">
                                          <strong><?php echo $_SESSION['admin_login']?></strong>
                                      </a>

                </li>
                <li>
                  <a href="javascript:void(0)">
                                          <strong><?php echo $_SESSION['admin_name']?></strong>
                                      </a>

                </li>

                <li class="divider">
                  <li>
                    <li>
                      <a href="javascript:void(0)">
                                            <i class="gi gi-settings fa-fw pull-right"></i>
                                            Settings
                                        </a>
                    </li>
                    <li>
                      <a href="#" class="logout">
                                            <i class="gi gi-lock fa-fw pull-right"></i>
                                            Log out
                                        </a>
                    </li>
              </ul>
              </li>
              <!-- END User Dropdown -->
          </ul>
          <!-- END Right Header Navigation -->
        </header>
        <!-- END Header -->

        <!-- Page content -->
        <div id="page-content">
          <!-- Page Header -->
          <div class="content-header">
            <div class="row">
              <div class="col-sm-6">
                <div class="header-section">
                  <h1>Packages</h1>
                </div>
              </div>

            </div>
          </div>
          <!-- END Page Header -->

          <!-- Datatables Block -->
          <!-- Datatables is initialized in js/pages/uiTables.js -->
          <div class="block full">
            <div class="table-responsive">
              <table id="datatable" class="table table-striped table-bordered table-vcenter">
                <thead>
                  <tr>
                    <th onclick="sortTable(0)" class="text-center" style="width: 50px;">ID</th>
                    <th onclick="sortTable(1)">Name</th>
                    <th onclick="sortTable(2)">Price</th>
                    <th onclick="sortTable(3)" class="text-center">Number of classes</th>
                    <th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i></th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($packages as &$value){?>
                    <tr>
                        <td class="text-center"><?php echo $value['id']?></td>
                        <td><strong><?php echo $value['name']?></strong></td>
                        <td><span><?php echo $value['price']?></span></td>
                        <td class="text-center"><?php echo $value['number']?></td>
                        <td class="text-center">
                            <a href="#modal-compose2" data-toggle="modal" class="btn btn-effect-ripple btn-xs btn-success"
                               data-id = "<?php echo $value['id']?>" data-name = "<?php echo $value['name']?>" data-price = "<?php echo $value['price']?>"  data-number = "<?php echo $value['number']?>" onclick="move(this);">
                                <i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)" data-toggle="tooltip" title="Delete Class" class="btn btn-effect-ripple btn-xs btn-danger delete-package" data-id="<?php echo $value['id']?>"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="block-section">
              <a href="#modal-compose" class="btn btn-effect-ripple btn-block btn-success" data-toggle="modal"><i class="fa fa-plus"></i> Add Package</a>
            </div>
          </div>
          <!-- END Datatables Block -->


        </div>
        <!-- END Page Content -->
      </div>
      <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
  </div>
  <!-- END Page Wrapper -->
  <!-- Compose Modal -->
  <div id="modal-compose" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title"><strong>Add Package</strong></h3>
        </div>
        <div class="modal-body">
          <form action="" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
            <div class="form-group">
              <div class="col-xs-12">
                <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Name</label>
                  <div class="col-md-6">
                    <input type="text" id="add-name" name="name" class="form-control" placeholder="Class name..">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Price</label>
                  <div class="col-md-6">
                    <input type="text" id="add-price" name="price" class="form-control" placeholder="100$">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Number of classes</label>
                  <div class="col-md-6">
                    <input type="number" id="add-number" name="number" class="form-control">
                  </div>
                </div>

              </div>
            </div>

            <div class="form-group form-actions">
              <div class="col-xs-12 text-right">
                <button type="submit" class="btn btn-effect-ripple btn-primary add-package">Add</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- END Compose Modal -->

  <!-- Compose Modal -->
  <div id="modal-compose2" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title"><strong>Edit Package</strong></h3>
        </div>
        <div class="modal-body">
          <form action="" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
            <div class="form-group">
              <div class="col-xs-12">
                  <div class="form-group">
                      <label class="col-md-4 control-label" for="pid">ID</label>
                      <div class="col-md-6">
                          <input type="text" id="pid" name="pid" class="form-control" value="ID" readonly>
                      </div>
                  </div>

                <div class="form-group">
                  <label class="col-md-4 control-label" for="name">Name</label>
                  <div class="col-md-6">
                    <input type="text" id="pname" name="name" class="form-control" placeholder="Package name..">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">Price</label>
                  <div class="col-md-6">
                    <input type="text" name="price" id="pprice" class="form-control" placeholder="100$">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Number of classes</label>
                  <div class="col-md-6">
                    <input type="number" name="number" id="pnumber" class="form-control">
                  </div>
                </div>

              </div>
            </div>

            <div class="form-group form-actions">
              <div class="col-xs-12 text-right">
                <button type="submit" class="btn btn-effect-ripple btn-primary edit-package">Edit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- END Compose Modal -->


  <!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
  <script src="js/vendor/jquery-2.2.4.min.js"></script>
  <script src="js/vendor/bootstrap.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/app.js"></script>
  <script src="js/requestHandler.js"></script>

  <script src="js/pages/uiTables.js"></script>
  <script>
    $(function() {
      UiTables.init();
    });
  </script>
  <script>
    function move(e) {
        document.getElementById("pid").value = e.dataset.id;
        document.getElementById("pname").value = e.dataset.name;
        document.getElementById("pprice").value = e.dataset.price;
        document.getElementById("pnumber").value = e.dataset.number;
    }
  </script>
</body>

</html>
