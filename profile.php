<?php
  
  if(!isset($_COOKIE["logged"])) {
    header("Location: index.php");
  } 
?>
<!DOCTYPE html>
<html lang="en">
<!--Meta-->
<meta charset="UTF8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<!--Internal Files-->
<link rel="stylesheet" href="style.css" />
<!--External Files-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
<link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

<head>
  <title>Underground | View Profile</title>
  <link rel="icon" type="image/png" href="Images&Videos/logo-alt.png" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark nav-pills sticky-top">
    <a class="navbar-brand" href="index.php">
      <img src="Images&Videos/logo-alt.png" width="50" height="50" alt=""> The Underground</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navToggler"
      aria-controls="navToggler" aria-expanded="false" aria-label="Open Menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link active border-0 btn-outline-light" href="#home" role="tab" data-toggle="list">Home <span
              class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link border-0 btn-outline-light" href="#about" role="tab" data-toggle="list">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link border-0 btn-outline-light" href="#view" role="tab" data-toggle="list">View</a>
        </li>
      </ul>
    </div>
    <?php
      if(isset($_COOKIE["logged"]) || $_COOKIE["logged"] === true) {
          echo'
          <ul class="nav justify-content-end">
            <li class="nav-item">
              <a class="nav-link border-0 btn btn-sm btn-circle btn-outline-light d-flex justify-content-center align-items-center"
                style="overflow: hidden;" data-container="body" data-toggle="popover" data-placement="bottom">
                <img class="img-responsive rounded" src="Images&Videos/logo-alt2.png" style="
                object-fit: cover; width: 40px; margin-right: 5px;">
              </a>
            </li>
          </ul>
          ';
      } else {
          echo '
          <ul class="nav justify-content-end">
            <li class="nav-item">
              <a class="nav-link border-0 btn btn-sm btn-circle btn-outline-light d-flex justify-content-center align-items-center"
                style="overflow: hidden;" href="#account" role="tab" data-toggle="modal"><i class="fa fa-user"
                  style="font-size: 1.8em;"></i></a>
            </li>
          </ul>
          ';
      }
      ?>
  </nav>
  <ul id="popover-content" class="list-group bg-dark border-logored" style="display: none">
    <h5 class="text-white">Signed in as: <?php echo $_COOKIE["user"];?></h5>
    <hr class="text-white bg-white" />
    <a href="profile.php" class="list-group-item bg-dark text-logored border-logored">Your Profile</a>
    <a href="productlist.php" class="list-group-item bg-dark text-logored border-logored">Your Products</a>
    <a href="orders.php" class="list-group-item bg-dark text-logored border-logored">Your Orders</a>
    <hr class="text-white bg-white" />
    <a href="#account" role="tab" data-toggle="modal" class="list-group-item bg-dark text-logored border-logored">Switch
      Accounts</a>
    <a href="logout.php" class="list-group-item bg-dark text-logored border-logored">Sign Out</a>
  </ul>
  <div class="pos-f-t">
    <div class="collapse" id="navToggler">
      <div class="list-group list-group-horizontal list-group-dark" id="navList" role="tablist">
        <a href="#home" class="list-group-item list-group-item-dark list-group-item-action" role="tab"
          data-toggle="list">Home <span class="sr-only">(current)</span></a>
        <a href="#about" class="list-group-item list-group-item-dark list-group-item-action" role="tab"
          data-toggle="list">About</a>
        <a href="#view" class="list-group-item list-group-item-dark list-group-item-action" role="tab"
          data-toggle="list">View Table</a>
      </div>
    </div>
  </div>
  <div class="position-absolute w-100">
    <div class="tab-content">
      <div class="tab-pane active" id="home" role="tabpanel">
        <div class="container p-3">
          <div class="text-center">
            <img src="Images&Videos/logo-alt2.png" class="img-responsive w-50">
            <h1 class="text-logored"><?php echo $_COOKIE['user'];?></h1>
          </div>
          <div class="btn-group-vertical float-right p-3">
            <button class="btn btn-success mb-2" type="button" data-toggle="collapse" data-target="#editProfile"
              aria-expanded="false" aria-controls="edit-profile">
              Edit Profile
            </button>
            <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#areyousure">
              Delete Profile
            </button>
          </div>
          <div class="collapse  p-3" id="editProfile">
            <form method="POST" action="editpro.php" role="form">
              <div class="form-group">
                <div class="form-md input-group mt-5 mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="pEmail"><i class="fa fa-envelope prefix"></i></span>
                  </div>
                  <input type="email" id="newEmail" name="eemail" class="form-control form-control-md validate"
                    placeholder="Email Address" value="<?php echo $_COOKIE['email'];?>" />
                </div>
              </div>
              <div class="form-group">
                <div class="form-md input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="pUser"><i class="fa fa-user-circle-o prefix"></i></span>
                  </div>
                  <input type="text" id="username" name="euser" class="form-control form-control-md validate rounded-right"
                    placeholder="Username" aria-describedby="userHelpInline" value="<?php echo $_COOKIE['user'];?>" />
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <div class="form-md input-group mb-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="pFname"><i class="fa fa-user-o prefix"></i></span>
                      </div>
                      <input type="text" id="fname" name="efname" class="form-control form-control-md validate"
                        placeholder="First Name (Optional)" value="<?php echo $_COOKIE['first'];?>" />
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <div class="form-md input-group mb-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="nLName"><i class="fa fa-user-o prefix"></i></span>
                      </div>
                      <input type="text" id="lname" name="elname" class="form-control form-control-md validate"
                        placeholder="Last Name (Optional)" value="<?php echo $_COOKIE['last'];?>" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-md input-group mb-4">
                  <div class="input-group-prepend mx">
                    <span class="input-group-text" id="pPass">
                      <i class="fa fa-lock prefix"></i>
                    </span>
                  </div>
                  <input type="password" id="pPass" name="oldpass" class="form-control form-control-md validate mx-md rounded-right"
                    placeholder="Old Password" aria-describedby="passwordHelpInline" required />
                </div>
              </div>
              <div class="form-group">
                <div class="form-md input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="cPass">
                      <i class="fa fa-lock prefix"></i>
                    </span>
                  </div>
                  <input type="password" id="pNewPass" name="nepass" class="form-control form-control-md validate"
                    placeholder="New Password" required />
                </div>
              </div>
              <div class="text-center form-md mt-2">
                <button class="btn btn-light float-right" name="save" type="submit">
                  Save <i class="fa fa-pencil ml-1"></i>
                </button>
              </div>
          </div>
          </form>
        </div>
      </div>
      <div class="tab-pane" id="about" role="tabpanel">
        <p class="text-white">About</p>
      </div>
      <div class="tab-pane" id="view" role="tabpanel">
        <p>View</p>
        <table class="table table-bordered table-hover table-sm table-condensed bg-white">
          <thead>
            <tr>
              <th title="Field #1">#</th>
              <th title="Field #2">Category 1</th>
              <th title="Field #3">Category 2</th>
              <th title="Field #4">Category 3</th>
              <th title="Field #5">Catergory 4</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td align="right">0</td>
              <td>AAAA</td>
              <td>BBBB</td>
              <td>CCCC</td>
              <td>DDDD</td>
            </tr>
            <tr>
              <td align="right">1</td>
              <td>AAAB</td>
              <td>BBBC</td>
              <td>CCCD</td>
              <td>DDDA</td>
            </tr>
            <tr>
              <td align="right">2</td>
              <td>AABA</td>
              <td>BBCB</td>
              <td>CCDC</td>
              <td>DDAD</td>
            </tr>
            <tr>
              <td align="right">3</td>
              <td>AABB</td>
              <td>BBCC</td>
              <td>CCDD</td>
              <td>DDAA</td>
            </tr>
            <tr>
              <td align="right">4</td>
              <td>ABAA</td>
              <td>BCBB</td>
              <td>CDCC</td>
              <td>DADD</td>
            </tr>
            <tr>
              <td align="right">5</td>
              <td>ABAB</td>
              <td>BCBC</td>
              <td>CDCD</td>
              <td>DADA</td>
            </tr>
            <tr>
              <td align="right">6</td>
              <td>ABBA</td>
              <td>BCCB</td>
              <td>CDDC</td>
              <td>DAAD</td>
            </tr>
            <tr>
              <td align="right">7</td>
              <td>ABBB</td>
              <td>BCCC</td>
              <td>CDDD</td>
              <td>DAAA</td>
            </tr>
            <tr>
              <td align="right">8</td>
              <td>BAAA</td>
              <td>CBBB</td>
              <td>DCCC</td>
              <td>ADDD</td>
            </tr>
            <tr>
              <td align="right">9</td>
              <td>BAAB</td>
              <td>CBBC</td>
              <td>DCCD</td>
              <td>ADDA</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!---Delete-->
      <div class="modal fade" tabindex="-1" role="dialog" id="areyousure"
       aria-labelledby="areyousure" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content bg-dark text-white">
            <div class="modal-header">
              <h5 class="modal-title">Are You Sure?</h5>
            </div>
            <div class="modal-body">
              <form method="POST" action="deletepro.php" role="form" enctype="multipart/form-data">
              <button type="submit" class="btn btn-success" name="yes">Yes</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
              </form>
            </div>
          </div>
        </div>
      </div>
  

  <!---Registration & Login-->
  <div class="modal fade" id="account" role="dialog" aria-labelledby="regristration" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog" role="document">
      <div class="modal-content bg-dark text-white">
        <div class="modal-tabs">
          <ul class="nav nav-tabs md-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active border-0 btn-outline-light" data-toggle="tab" href="#login" role="tab"><i
                  class="fa fa-user mr-1"></i> Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link border-0 btn-outline-light" data-toggle="tab" href="#register" role="tab"><i
                  class="fa fa-user-plus mr-1"></i> Register</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade in show active" id="login" role="tabpanel">
              <div class="modal-body mb-1">
                <form method="POST" action="login.php" role="form" enctype="multipart/form-data">
                  <div class="form-group">
                    <div class="md-form form-sm input-group mt-5 mb-5">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="eEmail"><i class="fa fa-envelope prefix"></i></span>
                      </div>
                      <input type="email" id="Email" name="email" class="form-control form-control-sm validate"
                        placeholder="Email Address" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="md-form form-sm input-group mb-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="User"><i class="fa fa-user-circle-o prefix"></i></span>
                      </div>
                      <input type="text" id="user" name="user" class="form-control form-control-sm validate rounded-right"
                        placeholder="Username" aria-describedby="username" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="md-form form-sm input-group mb-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="ePass">
                          <i class="fa fa-lock prefix"></i>
                        </span>
                      </div>
                      <input type="password" id="Pass" name="pass" class="form-control form-control-sm validate"
                        placeholder="Password" required />
                    </div>
                  </div>
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="keepme" name="rem">
                    <label class="form-check-label" for="#keepme">Keep me signed in</label>
                  </div>
                  <div class="text-center mt-2">
                    <button class="btn btn-light" type="submit" name="login">
                      Log in <i class="fa fa-sign-in ml-1"></i>
                    </button>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <div class="options text-center text-md-right mt-1">
                  <p>
                    Not a member?
                    <a href="#register" class="blue-text">Sign Up</a>
                  </p>
                  <p><a href="forgot_password.html" class="blue-text">Forgot Password?</a></p>
                </div>
                <button type="button" class="btn btn-outline-light waves-effect ml-auto" data-dismiss="modal">
                  Close
                </button>
              </div>
            </div>
            <div class="tab-pane fade" id="register" role="tabpanel">
              <div class="modal-body">
                <form method="POST" action="register.php" role="form" id="fregister"
enctype="multipart/form-data">
                  <div class="form-group">
                    <div class="md-form form-sm input-group mt-5 mb-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="nEmail"><i class="fa fa-envelope prefix"></i></span>
                      </div>
                      <input type="email" id="newEmail" name="nemail" class="form-control form-control-sm validate"
                        placeholder="New Email Address" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="md-form form-sm input-group mb-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="nUser"><i class="fa fa-user-circle-o prefix"></i></span>
                      </div>
                      <input type="text" id="username" name="nuser" class="form-control form-control-sm validate rounded-right"
                        placeholder="Username" aria-describedby="userHelpInline" required />
                    </div>
                  </div>

                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <div class="md-form form-sm input-group mb-4">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="nFName"><i class="fa fa-user-o prefix"></i></span>
                          </div>
                          <input type="text" id="fname" name="fname" class="form-control form-control-sm validate"
                            placeholder="First Name (Optional)" />
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <div class="md-form form-sm input-group mb-4">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="nLName"><i class="fa fa-user-o prefix"></i></span>
                          </div>
                          <input type="text" id="lname" name="lname" class="form-control form-control-sm validate"
                            placeholder="Last Name (Optional)" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="md-form form-sm input-group mb-4">
                      <div class="input-group-prepend mx">
                        <span class="input-group-text" id="nPass">
                          <i class="fa fa-lock prefix"></i>
                        </span>
                      </div>
                      <input type="password" id="newPass" name="npass"
                        class="form-control form-control-sm validate mx-sm rounded-right" placeholder="New Password"
                        aria-describedby="passwordHelpInline" required />
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="md-form form-sm input-group mb-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="cPass">
                          <i class="fa fa-lock prefix"></i>
                        </span>
                      </div>
                      <input type="password" id="confirmPass" name="cpass" class="form-control form-control-sm validate"
                        placeholder="Confirm Password" required />
                    </div>
                  </div>
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="ragree" id="tc" required>
                    <label class="form-check-label" for="#tc">
                      <a href="#termsandconditions" data-toggle="modal" role="tab">
                        Agree to Terms & Conditions
                      </a>
                    </label>
                  </div>
                  <div class="text-center form-sm mt-2">
                    <button class="btn btn-light" type="submit" name="signin" value="Sign up">
                      Sign Up
                    </button>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <div class="options text-right">
                  <p class="pt-1">
                    Already have an account?
                    <a href="#register" class="blue-text">Log In</a>
                  </p>
                </div>
                <button type="button" class="btn btn-outline-light waves-effect ml-auto" data-dismiss="modal">
                  Close
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--TOS-->
    <div class="modal fade" id="termsandconditions" tabindex="-1" role="dialog" aria-labelledby="termsandconditions"
      aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content bg-dark text-white">
          <div class="modal-header">
            <h5 class="modal-title">Terms and Conditions</h5>
          </div>
          <div class="modal-body">
            <h2>Welcome to Underground</h2>
            <p>These terms and conditions outline the rules and regulations for the use of Underground's Website.</p>
            <br />
            <span style="text-transform: capitalize;"> Underground</span> is located at:<br />
            <address>Unknown Nowhere, Dildo <br />XXX XXX - Newfoundland , Canada<br />
            </address>
            <p>By accessing this website we assume you accept these terms and conditions in full. Do not continue to use
              Underground's website
              if you do not accept all of the terms and conditions stated on this page.</p>
            <p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice
              and any or all Agreements: "Client", "You" and "Your" refers to you, the person accessing this website
              and accepting the Company's terms and conditions. "The Company", "Ourselves", "We", "Our" and "Us", refers
              to our Company. "Party", "Parties", or "Us", refers to both the Client and ourselves, or either the Client
              or ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake
              the process of our assistance to the Client in the most appropriate manner, whether by formal meetings
              of a fixed duration, or any other means, for the express purpose of meeting the Client's needs in respect
              of provision of the Company's stated services/products, in accordance with and subject to, prevailing law
              of Canada. Any use of the above terminology or other words in the singular, plural,
              capitalisation and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>
            <h2>Cookies</h2>
            <p>We employ the use of cookies. By using Underground's website you consent to the use of cookies
              in accordance with Underground's privacy policy.</p>
            <p>Most of the modern day interactive web sites
              use cookies to enable us to retrieve user details for each visit. Cookies are used in some areas of our
              site
              to enable the functionality of this area and ease of use for those people visiting. Some of our
              affiliate / advertising partners may also use cookies.</p>
            <h2>License</h2>
            <p>Unless otherwise stated, Underground and/or it's licensors own the intellectual property rights for
              all material on Underground. All intellectual property rights are reserved. You may view and/or print
              pages from http://underground.onion for your own personal use subject to restrictions set in these terms
              and conditions.</p>
            <p>You must not:</p>
            <ol>
              <li>Republish material from http://underground.onion</li>
              <li>Sell, auction or sub-license material from http://underground.onion</li>
              <li>Reproduce, duplicate or copy material from http://underground.onion</li>
            </ol>
            <p>Redistribute content from Underground (unless content is specifically made for redistribution).</p>
            <h2>User Comments</h2>
            <ol>
              <li>This Agreement shall begin on the date hereof.</li>
              <li>Certain parts of this website offer the opportunity for users to post and exchange opinions,
                information,
                material and data ('Comments') in areas of the website. Underground does not screen, edit, publish
                or review Comments prior to their appearance on the website and Comments do not reflect the views or
                opinions ofUnderground, its agents or affiliates. Comments reflect the view and opinion of the
                person who posts such view or opinion. To the extent permitted by our applicable laws Underground shall
                not be responsible or liable for the Comments or for any loss cost, liability, damages or expenses
                caused
                and or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this
                website.</li>
              <li>Undergroundreserves the right to monitor all Comments and to remove any Comments which it considers
                in its absolute discretion to be inappropriate, offensive or otherwise in breach of these Terms and
                Conditions.</li>
              <li>You warrant and represent that:
                <ol>
                  <li>You are entitled to post the Comments on our website and have all necessary licenses and consents
                    to
                    do so;</li>
                  <li>The Comments do not infringe any intellectual property right, including without limitation
                    copyright,
                    patent or trademark, or other proprietary right of any third party;</li>
                  <li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise
                    unacceptable material
                    or material which is an invasion of privacy</li>
                  <li>The Comments will not be used to solicit or promote business or custom or present commercial
                    activities
                    or unacceptable activity.</li>
                </ol>
              </li>
              <li>You hereby grant to <strong>Underground</strong> a non-exclusive royalty-free license to use,
                reproduce,
                edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats
                or media.</li>
            </ol>
            <h2>Hyperlinking to our Content</h2>
            <ol>
              <li>The following organizations may link to our Web site without prior written approval:
                <ol>
                  <li>Contraband agencies;</li>
                  <li>Search engines;</li>
                  <li>News organizations;</li>
                  <li>Online directory distributors when they list us in the directory may link to our Web site in the
                    same
                    manner as they hyperlink to the Web sites of other listed businesses; and</li>
                  <li>Systemwide Accredited Businesses except soliciting non-profit organizations, charity shopping
                    malls,
                    and charity fundraising groups which may not hyperlink to our Web site.</li>
                </ol>
              </li>
            </ol>
            <ol start="2">
              <li>These organizations may link to our home page, to publications or to other Web site information so
                long
                as the link: (a) is not in any way misleading; (b) does not falsely imply sponsorship, endorsement or
                approval of the linking party and its products or services; and (c) fits within the context of the
                linking
                party's site.
              </li>
              <li>We may consider and approve in our sole discretion other link requests from the following types of
                organizations:
                <ol>
                  <li>Organizations that are willing to break the law;</li>
                  <li>dot.com community sites;</li>
                  <li>associations or other groups representing charities, including charity giving sites,</li>
                  <li>online directory distributors;</li>
                  <li>internet portals;</li>
                  <li>accounting, law and consulting firms whose primary clients are businesses; and</li>
                  <li>educational institutions and trade associations.</li>
                </ol>
              </li>
            </ol>
            <p>We will approve link requests from these organizations if we determine that: (a) the link would not
              reflect
              unfavorably on us or our accredited businesses (for example, trade associations or other organizations
              representing inherently suspect types of business, such as work-at-home opportunities, shall not be
              allowed
              to link); (b)the organization does not have an unsatisfactory record with us; (c) the benefit to us from
              the visibility associated with the hyperlink outweighs the absence of Underground; and (d) where the
              link is in the context of general resource information or is otherwise consistent with editorial content
              in a newsletter or similar product furthering the mission of the organization.</p>

            <p>These organizations may link to our home page, to publications or to other Web site information so long
              as
              the link: (a) is not in any way misleading; (b) does not falsely imply sponsorship, endorsement or
              approval
              of the linking party and it products or services; and (c) fits within the context of the linking party's
              site.</p>

            <p>If you are among the organizations listed in paragraph 2 above and are interested in linking to our
              website,
              you must notify us by sending an e-mail to <a href="mailto:S3CR3T@underground.onion"
                title="send an email to S3CR3T@underground.onion">S3CR3T@underground.onion</a>.
              Please include your name, your organization name, contact information (such as a phone number and/or
              e-mail
              address) as well as the URL of your site, a list of any URLs from which you intend to link to our Web
              site,
              and a list of the URL(s) on our site to which you would like to link. Allow 2-3 weeks for a response.</p>

            <p>Approved organizations may hyperlink to our Web site as follows:</p>

            <ol>
              <li>By use of our corporate name; or</li>
              <li>By use of the uniform resource locator (Web address) being linked to; or</li>
              <li>By use of any other description of our Web site or material being linked to that makes sense within
                the
                context and format of content on the linking party's site.</li>
            </ol>
            <p>No use of Underground's logo or other artwork will be allowed for linking absent a trademark license
              agreement.</p>
            <h2>Iframes</h2>
            <p>Without prior approval and express written permission, you may not create frames around our Web pages or
              use other techniques that alter in any way the visual presentation or appearance of our Web site.</p>
            <h2>Reservation of Rights</h2>
            <p>We reserve the right at any time and in its sole discretion to request that you remove all links or any
              particular
              link to our Web site. You agree to immediately remove all links to our Web site upon such request. We also
              reserve the right to amend these terms and conditions and its linking policy at any time. By continuing
              to link to our Web site, you agree to be bound to and abide by these linking terms and conditions.</p>
            <h2>Removal of links from our website</h2>
            <p>If you find any link on our Web site or any linked web site objectionable for any reason, you may contact
              us about this. We will consider requests to remove links but will have no obligation to do so or to
              respond
              directly to you.</p>
            <p>Whilst we endeavour to ensure that the information on this website is correct, we do not warrant its
              completeness
              or accuracy; nor do we commit to ensuring that the website remains available or that the material on the
              website is kept up to date.</p>
            <h2>Content Liability</h2>
            <p>We shall have no responsibility or liability for any content appearing on your Web site. You agree to
              indemnify
              and defend us against all claims arising out of or based upon your Website. No link(s) may appear on any
              page on your Web site or within any context containing content or materials that may be interpreted as
              libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or
              other violation of, any third party rights.</p>
            <h2>Disclaimer</h2>
            <p>To the maximum extent permitted by our applicable rules, we exclude all representations, warranties and
              conditions relating to our website and the use of this website (including, without limitation, any
              warranties implied by law in respect of satisfactory quality, fitness for purpose and/or the use of
              reasonable care and skill). Nothing in this disclaimer will:</p>
            <ol>
              <li>limit or exclude our or your liability for death or personal injury resulting from negligence;</li>
              <li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>
              <li>limit any of our or your liabilities in any way that is not permitted under our rules; or</li>
              <li>exclude any of our or your liabilities that may not be excluded under our rules.</li>
            </ol>
            <p>The limitations and exclusions of liability set out in this Section and elsewhere in this disclaimer: (a)
              are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer or
              in relation to the subject matter of this disclaimer, including liabilities arising in contract, in tort
              (including negligence) and for breach of statutory duty.</p>
            <p>To the extent that the website and the information and services on the website are provided free of
              charge,
              we will not be liable for any loss or damage of any nature.</p>
            <h2></h2>
            <p></p>

          </div>
          <div class="modal-footer text-center">
            <div class="text-center"><em class="text-center">© 2020 Copyright: Underground.onion</em></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<!--Javascript-->
<!--External Files-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
  integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
  integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.15.5/dist/locale/bootstrap-table-zh-CN.min.js"></script>
<!--Internal Files-->
<script src="JavaScript/index.js"></script>

</html>
