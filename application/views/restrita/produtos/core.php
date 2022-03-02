
<?php $this->load->view('restrita/layout/navbar'); ?>
<?php $this->load->view('restrita/layout/sidebar'); ?>



<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <!-- add content here -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><?php echo $titulo; ?></h4>
                        </div>

                        <?php
                        $atributos = array(
                            'name' => 'form_core'
                        );

                        if (isset($produto)) {
                            $produto_id = $produto->produto_id;
                        } else {
                            $produto_id = '';
                        }
                        ?>

                        <?php echo form_open('restrita/produtos/core/' . $produto_id, $atributos); ?>                 

                        <div class="card-body">
                            
                            <?php if(isset($produto)): ?>
                            
                            <div class= "form-row">

                                    <div class="col-md-12">
                                        <label>Meta Link do produto</label>
                                        <p class="text-info"><?php echo $produto->produto_meta_link; ?></p>

                                    </div>

                                </div>
                            
                            <?php endif; ?>

                            <div class="form-row">
                                
                                <div class="form-group col-md-4">
                                    <label>Código do produto</label>
                                    <input type="text" name="produto_codigo" class="form-control" value="<?php echo (isset($produto) ? $produto->produto_codigo : set_value('produto_codigo')); ?>">
                                    <?php echo form_error('produto_codigo', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label>Nome do produto</label>
                                    <input type="text" name="produto_nome" class="form-control" value="<?php echo (isset($produto) ? $produto->produto_nome : set_value('produto_nome')); ?>">
                                    <?php echo form_error('produto_nome', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <label for="inputState">Categoria</label>
                                    <select id="inputState" class="form-control" name="produto_categoria_id">
                                        
                                       <?php foreach ($categorias as $categoria):?>
                                        
                                        
                                        

                                        <?php if (isset($produto)): ?>

                                            <option value="<?php echo $categoria->categoria_id; ?>" <?php echo ($categoria->categoria_id == $produto->produto_categoria_id ? 'selected' : '') ?>><?php echo $categoria->categoria_nome; ?>
                                            </option>
                                            

                                        <?php else: ?>

                                            <option value="<?php echo $categoria->categoria_id; ?>"><?php echo $categoria->categoria_nome; ?>
                                            </option>
                                            

                                        <?php endif; ?>
                                            
                                         <?php endforeach; ?>


                                    </select>
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <label for="inputState">Marcas</label>
                                    <select id="inputState" class="form-control" name="produto_categoria_id">
                                        
                                       <?php foreach ($marcas as $marca):?>
                                        
                                        
                                        

                                        <?php if (isset($produto)): ?>

                                            <option value="<?php echo $marca->marca_id; ?>" <?php echo ($marca->marca_id == $produto->produto_marca_id ? 'selected' : '') ?>><?php echo $marca->marca_nome; ?>
                                            </option>
                                            

                                        <?php else: ?>

                                            <option value="<?php echo $marca->marca_id; ?>"><?php echo $marca->marca_nome; ?>
                                            </option>
                                            

                                        <?php endif; ?>
                                            
                                         <?php endforeach; ?>


                                    </select>
                                </div>
                                
                                
                                
                                
                                

                                


                               



                            </div>

                            <div class="form-row">

                                <?php if (isset($produto)): ?>
                                    <input type="hidden" name="produto_id" value="<?php echo $produto->produto_id; ?>">
                                <?php endif; ?>


                            </div>



                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary mr-2">Salvar</button>
                            <a class="btn btn-dark" href="<?php echo base_url('restrita/produtos'); ?>">Voltar</a>
                        </div>

                        <?php echo form_close(); ?>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php $this->load->view('restrita/layout/sidebar_settings'); ?> 


</div>

