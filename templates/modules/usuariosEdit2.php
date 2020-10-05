<?php // formulario editar datos del usuario
if(isset($_COOKIE['user_code']) && isset($_COOKIE['user_rol']) &&  $_COOKIE['user_rol']==4){?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Nombre</label>
            <input type="hidden" class="inps-forms" id="cod" value="<?php echo $_COOKIE['user_code'];?>" /><input type="text" id="nom" class="form-control inps-forms" />
        </div>
        <label>Tipo de Identificación</label>
        <select id="sel-per-iden" class="custom-select inps-forms mb-3">
            <option disabled value="none">Seleccione...</option>
            <option value="1">Cédula de ciudadanía</option>
            <option value="2">Pasaporte</option>
            <option value="3">Cédula de extranjeria</option>
            <option value="4">NIT</option>
        </select>
        <div class="form-group">
            <label>Número de Identificación</label>
            <input type="text" id="ni" class="form-control inps-forms" />
        </div>
        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" id="tel" class="form-control inps-forms" />
        </div>

        <div class="form-group">
            <label>Departamento de Residencia</label>
            <select id="sel-depa" class="custom-select inps-forms mb-3" onchange="CargarCiudades3()">
                <?php include("ciudad.php");
          listarDep();
				?>
            </select>
        </div>
        <div class="form-group">
            <label>Ciudad de Residencia</label>
            <select id="sel-ciud" class="custom-select inps-forms mb-3">
                <?php 
             listarCiu();
				?>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Dirección</label>
            <input type="text" id="dir" class="form-control inps-forms" />
        </div>

        <div class="form-group">
            <label>Profesión</label>
            <input type="text" id="pro" class="form-control inps-forms" />
        </div>
        <div class="form-group">
            <label>Email / Usuario</label>
            <input type="email" id="ema" class="form-control inps-forms" />
        </div>
        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" id="con" class="form-control inps-forms" />
        </div>
        <div class="form-group">
            <label>Rol</label>
            <select id="sel-rol" class="custom-select inps-forms mb-3">
                <option value="4">Evaluador viabilidad</option>
            </select>
        </div>
        <div class="form-group">
            <label>Estado De Usuario</label>
            <select id="sel-esta" class="custom-select inps-forms mb-3">
                <option value="1">ACTIVO</option>
            </select>
        </div>
    </div>
</div>
<div class="text-center">
    <button class="btn-functions" id="btn-add-pers" onclick="upd_userrrr()"><i class="fas fa-check"></i>&nbsp;Actualizar</button>
</div>
<script>
    $(document).ready(function () {
        ConsultaUsuario();
    });
</script>

<?php }
else{?>
<script>
    location.href = "index.php";
</script>
<?php    
}
?>
