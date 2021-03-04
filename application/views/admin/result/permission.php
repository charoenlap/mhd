<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $heading_title;?></h1>
                </div>
                <div class="col-sm-6">
                    <?php if ($breadcrumbs) : ?>
                    <ol class="breadcrumb float-sm-right">
                        <?php foreach ($breadcrumbs as $title => $link) { ?>
                        <li class="breadcrumb-item"><a href="<?php echo $link;?>"><?php echo $title; ?></a></li>
                        <?php } ?>
                    </ol>
                    <?php endif; ?>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php if (!empty($success)) : ?>
                    <div class="alert alert-success alert-dismissible"><?php echo $success;?></div>
                    <?php endif;?>
                    <?php if (!empty($error)) : ?>
                    <div class="alert alert-danger alert-dismissible"><?php echo $error;?></div>
                    <?php endif;?>
                    <div class="card">
                        <div class="card-body">
                        <a href="<?php echo $link_redirect;?>" class="btn btn-default shadow-sm" target="new" style="">
                            <img style="width:18px; height:18px; margin:3px 3px;" alt="Google sign-in" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" /> 
                            <span style="font-size:14px; color:rgba(0,0,0,0.54); margin-left:5px; margin-right:8db;">Sign out with Google</span>
                        </a>
                        <hr />
                        <div class="row mt-2">
                          <div class="col-6">
                            Client ID : <br />
                            <?php echo $credentials['client_id'];?>
                          </div>
                          <div class="col-6">
                            Project ID : <br />
                            <?php echo $credentials['project_id'];?>
                          </div>
                          <div class="col-6">
                          Folder Shared : <br />
                          <a href="https://drive.google.com/drive/u/0/folders/<?php echo $credentials['folderId'];?>" target="_blank">
                          <?php echo $credentials['folderId'];?>
                          </a>
                          </div>
                        </div>
                        <div class="row mt-2">
                          <div class="col-12">
                          <a href="https://console.developers.google.com/apis/credentials/oauthclient/<?php echo $credentials['client_id'];?>?project=<?php echo $credentials['project_id'];?>" target="_blank">
                          https://console.developers.google.com/apis/credentials/oauthclient/<?php echo $credentials['client_id'];?>?project=<?php echo $credentials['project_id'];?>
                          </a>
                          </div>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<style type="text/css">
    #customBtn {
      display: inline-block;
      background: white;
      color: #444;
      width: 190px;
      border-radius: 5px;
      border: thin solid #888;
      box-shadow: 1px 1px 1px grey;
      white-space: nowrap;
    }
    #customBtn:hover {
      cursor: pointer;
    }
    span.label {
      font-family: serif;
      font-weight: normal;
    }
    span.icon {
      background: url('/identity/sign-in/g-normal.png') transparent 5px 50% no-repeat;
      display: inline-block;
      vertical-align: middle;
      width: 42px;
      height: 42px;
    }
    span.buttonText {
      display: inline-block;
      vertical-align: middle;
      padding-left: 42px;
      padding-right: 42px;
      font-size: 14px;
      font-weight: bold;
      /* Use the Roboto font that is loaded in the <head> */
      font-family: 'Roboto', sans-serif;
    }
  </style>