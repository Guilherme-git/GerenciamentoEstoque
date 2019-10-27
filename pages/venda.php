<?php 
    require_once '../class/conexao.php';

    $conexao = Conexao::getInstance();
    $idProduto = $_POST['nomeProduto']; 

    $select = $conexao->Conectar()->prepare("SELECT * FROM produto WHERE id_produto=?");
    $select->execute(array($idProduto));
    $res = $select->fetchAll();

    foreach($res as $value){
        if($value['quantidade_produto'] > 0){
?>
    <label for="disabledNumberInput">Preço da Unidade</label>
    <input type="number" id="disabledNumberInput" disabled class="form-control" required id="inputCity" name="preçoVenda" value="<?php echo $value['valorVenda_produto']; ?>"  placeholder="Preço de venda"><span style="color: blue; ">Quantidade no estoque = <?php echo $value['quantidade_produto']; ?></span>  
   
<?php }else{ ?>
    <h6 style="color: red;">Não existe este  produto no estoque</h6>
<?php } }?>