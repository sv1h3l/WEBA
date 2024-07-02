<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3 pb-3">
  <h1 class="pb-3 border-bottom">Dashboard</h1>

  <!--<section class="mt-5">-->
  <h2>Last 10 logins</h2>

  <table style='border-collapse: collapse; width: 100%'>
    <tr>
      <th style='padding: 10px; border: 1px solid #000;'>Email</th>
      <th style='padding: 10px; border: 1px solid #000;'>Name</th>
      <th style='padding: 10px; border: 1px solid #000;'>Surname</th>
      <th style='padding: 10px; border: 1px solid #000;'>Phone</th>
    </tr>
    <?php include "Models/sql/getLogins.php"; ?>
  </table>
  <!--</section>-->

  <h2>Last logins</h2>

  <script type="module">
    import { ddd } from './Components/logs.js';
    
    const result = ddd(10);
    console.log(result);
</script>



  <section class="mt-5">
    <h2>Simple form example</h2>

    <form class="row g-3">
      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" class="form-control" id="inputEmail4">
      </div>
      <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Password</label>
        <input type="password" class="form-control" id="inputPassword4">
      </div>
      <div class="col-12">
        <label for="inputAddress" class="form-label">Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
      </div>
      <div class="col-12">
        <label for="inputAddress2" class="form-label">Address 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
      </div>
      <div class="col-md-6">
        <label for="inputCity" class="form-label">City</label>
        <input type="text" class="form-control" id="inputCity">
      </div>
      <div class="col-md-4">
        <label for="inputState" class="form-label">State</label>
        <select id="inputState" class="form-select">
          <option selected>Choose...</option>
          <option>...</option>
        </select>
      </div>
      <div class="col-md-2">
        <label for="inputZip" class="form-label">Zip</label>
        <input type="text" class="form-control" id="inputZip">
      </div>
      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="gridCheck">
          <label class="form-check-label" for="gridCheck">
            Check me out
          </label>
        </div>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Sign in</button>
      </div>
    </form>
  </section>


  <section class="mt-5">
    <h2>Notifications examples</h2>
    <div class="alert alert-success" role="alert">
      A simple success alert—check it out!
    </div>
    <div class="alert alert-danger" role="alert">
      A simple danger alert—check it out!
    </div>
    <div class="alert alert-info" role="alert">
      A simple info alert—check it out!
    </div>
  </section>


  <section class="mt-5">
    <h2>Badge examples</h2>
    <span class="badge text-bg-primary">Primary</span>
    <span class="badge text-bg-secondary">Secondary</span>
    <span class="badge text-bg-success">Success</span>
    <span class="badge text-bg-danger">Danger</span>
    <span class="badge text-bg-warning">Warning</span>
    <span class="badge text-bg-info">Info</span>
    <span class="badge text-bg-light">Light</span>
    <span class="badge text-bg-dark">Dark</span>
  </section>


  <section class="mt-5">
    <h2>Button examples</h2>
    <button type="button" class="btn btn-primary">Primary</button>
    <button type="button" class="btn btn-secondary">Secondary</button>
    <button type="button" class="btn btn-success">Success</button>
    <button type="button" class="btn btn-danger">Danger</button>
    <button type="button" class="btn btn-warning">Warning</button>
    <button type="button" class="btn btn-info">Info</button>
    <button type="button" class="btn btn-light">Light</button>
    <button type="button" class="btn btn-dark">Dark</button>
  </section>


  <section class="mt-5">
    <h2>Others</h2>
    <button type="button" class="btn btn-primary position-relative">
      Inbox
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        99+
        <span class="visually-hidden">unread messages</span>
      </span>
    </button>
  </section>
</main>
</div>
</div>