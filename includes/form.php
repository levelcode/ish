<div id="form" class="container">
  <div class="row">
    <div class="form col-xs-12 col-md-6 col-lg-6">
      <form>
        <h5>REGISTRE SU FACTURA</h5>
        <div class="name-dad input-field form-group">
          <input class="form-control" type="text" name="nameCliente" placeholder="Nombre del cliente">
        </div>
        <div class="name-toy input-field form-group">
          <input class="form-control" type="text" name="lastnameClient" placeholder="Apellido del cliente">
        </div>
        <div class="name-toy input-field form-group">
          <input class="form-control" type="text" name="identification" placeholder="Identificación">
        </div>
        <div class="name-toy input-field form-group">
          <input class="form-control" type="text" name="phone" placeholder="Teléfono">
        </div>
        <div class="name-toy input-field form-group">
          <input class="form-control" type="text" name="mail" placeholder="E-mail">
        </div>
        <div class="name-toy input-field form-group">
          <input class="form-control" type="text" name="country" placeholder="Ciudad">
        </div>
        <div class="name-toy last input-field form-group">
          <input class="form-control" type="text" name="nametoy" placeholder="Nombre del juguete">
        </div>

        <div class="bill field form-group">
          <label>Sube aquí la foto de su FACTURA</label>
          <input type="file" name="bill" class="file form-control">
          <input type="button" class="btn" value="SUBIR FOTO">
          <img>
        </div>
        <?php if(isset($_SESSION['fb_user'])): ?>
          <input type="hidden" class="form-control" name="data" value="<?php print $_SESSION['fb_user']['id'] ?>">
        <?php endif; ?>
        <div class="toy field form-group">
          <label>Sube aquí la foto de tu JUGUETE</label>
          <input type="file" name="toy" class="file form-control">
          <input type="button" class="btn" value="SUBIR FOTO">
          <img>
        </div>
        <div class="form-group term">
          <span><input name="terms" type="checkbox" name="check" id="check"> He leído y estoy de acuerdo con los <a href="terms.pdf" target="_blank"><strong>Términos y Condiciones</strong></a></span><br>
        </div>
        <input class="btn-sb" type="submit" name="send" value="ENTRAR">
      </form>
    </div>
    <div class="img col-xs-12 col-md-6 col-lg-6">
      <div>
        <img src="../assets/juguetes_form.png" alt="fotm" title="form">
      </div>
    </div>
  </div>
</div>
