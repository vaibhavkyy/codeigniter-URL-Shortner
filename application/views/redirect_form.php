<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Short URL</title>
    <?php echo link_tag('assets/css/bootstrap.min.css');?>
  </head>
  <body>
    <div class="container">
  <?php echo form_open('url/short_url' , ['class'=>'form-horizontal']) ;?>
    <div class="container">
      <fieldset>
          <legend>Short your URL here</legend>
          <div class="row">
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">URL</label>
                  <?php echo form_input(['name'=>'url','type'=>'url','class'=>'form-control','placeholder'=>'http://example.com']);?>
                  <small  class="text-danger col-lg-8"><?php echo form_error('url'); ?></small>
                </div>
              </div>
          </div>
            <?php echo form_submit(['name'=>'submit','value'=>'Short url','class'=>'btn btn-primary']);?>
      </fieldset>
    </div>
  </form>
  <div style="margin-top:50px">
  <?php if($data = $this->session->flashdata('short'))
  {
    echo "your short URL is "."<p class='text-info'>".$data."</p>" ;
  }
  ?>
</div>
</div>
  </body>
</html>
