
            
          <div id="blockpreview" class="d-none">
            <div class="row">
              <div class="col-6">
                <button type="button" id="showgoback" class="btn btn-secondary">ย้อนกลับ</button>
              </div>
              <div class="col-6 text-right">
                <button type="button" id="print" class="btn btn-info">พิมพ์</button>
                <button type="submit" name="type_confirm" value="1" id="sendsubmit" class="btn btn-primary">ยืนยันส่งผลการตรวจ</button>
              </div>
            </div>

          </div>

          </div> <!-- close .card.card-body -->
        </div> <!-- close .collapse -->

      </form>
    </div> <!-- close .card-body -->
  </div> <!-- close .card -->
</div> <!-- close .container -->



<style>
  @media print {
    /* body {background:#333;}
    # */
    #blockpreview { display:none !important; }
    #wrapper .container-fluid { padding:0 !important; }
    .card, input, textarea, select { border:0 !important; box-shadow:0 0 0 !important; height:auto !important; }
}
</style>
<!-- Script -->
<script>
  $(function () {
    // Init 
    <?php if ( isset($_POST['type']) && !empty($_POST['type']) && $_POST['type']=='preview' ) : ?>
      $('input,select,textarea').attr('disabled','disabled');
      $('#blockpreview').show().removeClass('d-none');
      $('.hidepreview').hide();
    <?php endif; ?>

    <?php if ($received_status!=null) : ?>
      $('#collapseTrial').collapse('show');
    <?php endif; ?>


    // Event
    $('#print').click(function(e) {
      console.log('ok');
      window.print();
    });
    $('#sendsubmit').click(function(e) { 
      e.preventDefault();
      $('input,select,textarea').removeAttr('disabled');
      $('[name="type"]').val('submit');
      $('form').submit();
    });
    $('#showgoback').click(function (e) { 
      e.preventDefault();
      $('input,select,textarea').removeAttr('disabled');
      $('[name="type"]').val('');
      $('form').submit();
    });
    $('[name=received_status]').change(function (e) { 
      e.preventDefault();
      if ($(this).val()=='true'||$(this).val()=='false') {
        $('#collapseTrial').collapse('show');
      } else {
        $('#collapseTrial').collapse('hide');
      }
    });

    // Setting
    $('.datepicker').datepicker({
      format: 'dd-mm-yyyy',
      endDate: 'today'
    });
  });
</script>

<!-- Script -->