<?php include_once 'includes/templates/header.php';

require 'includes/paypal.php';
use Paypal\Rest\ApiContext;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\ExecutePayment;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

?>

<section class="seccion contenedor">
    <h2>Resumen Registro</h2>

    <?php 

      $paymentId = $_GET['paymentId'];
      $id_pago = (int) $_GET['id_pago'];

      // Peticion al API
      $pago = Payment::get($paymentId, $apiContext);
      $execution = new PaymentExecution();
      $execution->setPayerId($_GET['PayerID']);
    
      
      // Resultado tiene la información de la transacción
      $resultado = $pago->execute($execution, $apiContext);

      $respuesta = $resultado->transactions[0]->related_resources[0]->sale->state;

      echo "<div class='resultado correcto'>";
      echo "El pago se realizó correctamente. <br>";
      echo "El Id es {$paymentId}";
      echo "</div>";

      require_once 'includes/funciones/bd_conexion.php';
      $stmt = $conn->prepare('UPDATE registrados SET pagado = ? WHERE ID_registrado = ? ');
      $pagado = 1;
      $stmt->bind_param('ii', $pagado, $id_pago);
      $stmt->execute();
      $stmt->close();
      $conn->close();
      
?>

</section>

<?php include_once 'includes/templates/footer.php';?>