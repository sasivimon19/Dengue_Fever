<style>
    .codecollor{
        background: rgb(144,8,8);
        background: linear-gradient(to left, rgba(144,8,8,1) 0%, rgba(215,77,8,1) 100%);
        color: white;
</style>


<div class="row" id="Subtable_Sub">
        <div class="col-md-12">
            <div class="card-body">
                <table class="table table-bordered" id="table-data">
                    <thead class="codecollor"> 
                        <tr>
                            <th style="width: 10px">#</th>
                            <?php if ($TITLE == 'Occupation') { ?>
                                <th style="text-align: center; white-space:nowrap;"> <b>รหัสอาชีพ</b> <i class="fas fa-angle-double-down"></i> </th>
                                <th style="text-align: center; white-space:nowrap;"> <b>อาชีพ </b> <i class="fas fa-angle-double-down"></i></th>                                         
                            <?php } elseif ($TITLE == 'District') { ?>
                                <th style="text-align: center; white-space:nowrap;"> <b> รหัสจังหวัด </b> <i class="fas fa-angle-double-down"></i></th>
                                <th style="text-align: center; white-space:nowrap;"> <b> รหัสอำเภอ </b> <i class="fas fa-angle-double-down"></i></th> 
                                <th style="text-align: center; white-space:nowrap;"> <b> อำเภอ </b> <i class="fas fa-angle-double-down"></i></th>
                            <?php } elseif ($TITLE == 'Province') { ?>
                                <th style="text-align: center; white-space:nowrap;"> <b> รหัสจังหวัด</b> <i class="fas fa-angle-double-down"></i></th> 
                                <th style="text-align: center; white-space:nowrap;"> <b> จังหวัด </b> <i class="fas fa-angle-double-down"></i></th>
                            <?php } elseif ($TITLE == 'Title') { ?> 
                                <th style="text-align: center; white-space:nowrap;"> <b> รหัสคำนำหน้า</b> <i class="fas fa-angle-double-down"></i></th> 
                                <th style="text-align: center; white-space:nowrap;"> <b> คำนำหน้า</b> <i class="fas fa-angle-double-down"></i></th> 
                                <th style="text-align: center; white-space:nowrap;"> <b> เพศ </b> <i class="fas fa-angle-double-down"></i></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $num = 1;
                        foreach ($Total_data as $value) { ?>
                        <tr>

                            <td><?php echo $num; ?></td>

                            <?php if($TITLE == 'Occupation'){ ?>
                                <td><?php echo $value->CODE_OCCUP ?></td>
                                <td><?php echo iconv('TIS-620', 'UTF-8', $value->Occupation) ?></td>
                            <?php } else if ($TITLE == 'District'){ ?>
                                <td><?php echo $value->PROVINCE_ID ?></td>
                                <td><?php echo $value->DISTRICT_CODE ?></td>
                                <td><?php echo iconv('TIS-620', 'UTF-8', $value->DISTRICT) ?></td>
                            <?php } else if ($TITLE == 'Province'){ ?>    
                                <td><?php echo $value->PROVINCE_CODE ?></td>
                                <td><?php echo iconv('TIS-620', 'UTF-8', $value->PROVINCE) ?></td>
                             <?php } else if ($TITLE == 'Title'){ ?>    
                                <td><?php echo $value->TITLE_CODE ?></td>
                                <td><?php echo iconv('TIS-620', 'UTF-8', $value->TITLE) ?></td>   
                                <td><?php echo $value->SEX ?></td>
                            <?php } ?>

                        </tr>
                       <?php $num ++;  } ?>    
                    </tbody>
                </table>
            </div>

            <div class="card-footer clearfix">
                <ul class="pagination justify-content-center">
                    <li class="page-item" data-page="prev"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item" data-page="next" id="prev"><a class="page-link" href="#">Next</a></li>
                </ul>
            </div>
        </div>
    </div>



<script>
    getPagination('#table-data');

    function getPagination(table) {

        var lastPage = 1;

        $('.pagination')
                .find('li')
                .slice(1, -1)
                .remove();
        var trnum = 0;
        maxRows = 10;

        $('.pagination').show();
        var totalRows = $(table + ' tbody tr').length;
        $(table + ' tr:gt(0)').each(function () {
            trnum++;
            if (trnum > maxRows) {
                $(this).hide();
            }
            if (trnum <= maxRows) {
                $(this).show();
            }
        });

        if (totalRows > maxRows) {
            var pagenum = Math.ceil(totalRows / maxRows);
            for (var i = 1; i <= pagenum; ) {
                $('.pagination #prev')
                        .before(
                                '<li class="page-item"data-page="' +
                                i +
                                '">\
        <a class="page-link" href="#">' +
                                i++ +
                                '</a>\
    </li>')
                        .show();
            }
        } else {
            $('.pagination').hide();
        }

        $('.pagination [data-page="1"]').addClass('active');
        $('.pagination li').on('click', function (evt) {
            evt.stopImmediatePropagation();
            evt.preventDefault();
            var pageNum = $(this).attr('data-page');
            var maxRows = 10;
            if (pageNum == 'prev') {
                if (lastPage == 1) {
                    return;
                }
                pageNum = --lastPage;
            }
            if (pageNum == 'next') {
                if (lastPage == $('.pagination li').length - 2) {
                    return;
                }
                pageNum = ++lastPage;
            }
            lastPage = pageNum;
            var trIndex = 0;
            $('.pagination li').removeClass('active');
            $('.pagination [data-page="' + lastPage + '"]').addClass('active');

            limitPagging();
            $(table + ' tr:gt(0)').each(function () {

                trIndex++;
                if (
                        trIndex > maxRows * pageNum ||
                        trIndex <= maxRows * pageNum - maxRows
                        ) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });

        limitPagging();


    }

    function limitPagging() {


        if ($('.pagination li').length > 7) {
            if ($('.pagination li.active').attr('data-page') <= 3) {
                $('.pagination li:gt(5)').hide();
                $('.pagination li:lt(5)').show();
                $('.pagination [data-page="next"]').show();
            }
            if ($('.pagination li.active').attr('data-page') > 3) {
                $('.pagination li:gt(0)').hide();
                $('.pagination [data-page="next"]').show();
                for (let i = (parseInt($('.pagination li.active').attr('data-page')) - 2); i <= (parseInt($('.pagination li.active').attr('data-page')) + 2); i++) {
                    $('.pagination [data-page="' + i + '"]').show();

                }

            }
        }
    }
</script>
