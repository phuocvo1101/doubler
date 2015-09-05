
<form id="frm" action="index.php?controller=program&action=index" method="post">
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">

                        <header class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 placeholder">
                                    <h3 align="left"><span> Programs</span></h3>
                                </div>

                                <div class=" col-xs-6 col-sm-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="search" name="search" value="{if isset($search)}{$search}{/if}" placeholder="Search...">
                                          <span class="input-group-btn">
                                           <input class="btn btn-default" type="submit" id="go" name="go" value="Go!" />
                                          </span>
                                    </div>

                                </div>


                            </div>
                        </header>
                        <div class="panel-body">
                            <section id="unseen">
                                <table class="table table-bordered table-striped table-condensed">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>ImageUrl </th>
                                        <th>Categories</th>
                                        <th>ProductUrl </th>
                                        <th>Program Name </th>
                                        <th>Price </th>




                                    </tr>
                                    </thead>
                                    <tbody>
                                    {if isset($programs)}
                                        {foreach $programs as $key=>$program}
                                            {foreach $program as $k=>$item}
                                            <tr>
                                                <td>{$item['name']}</td>
                                                <td>{$item['description']}</td>
                                                <td><img src="{$item['productImage']['url']}" width="150px" height="150px"/>
                                                </td>
                                                <td>{foreach $item['categories'] as $key=>$cate}
                                                        <span>{$cate['name']}</span>
                                                    {/foreach}
                                                </td>
                                                {foreach $item['offers'] as $key=>$off}
                                                    {assign var=arrurl value="?"|explode:$off['productUrl']}
                                                    {assign var=url value=$arrurl[0]|cat:'?epi('|cat:$userid|cat:')'|cat:$arrurl[1]}
                                                    <td><a target="_blank" href="{$url}">Product Links</a>
                                                    </td>
                                                    <td>{$off['programName']}</td>
                                                    <td>{foreach $off['priceHistory'] as $key=>$price}
                                                            <span>{$price['price']['value']}</span><span> {$price['price']['currency']}</span>
                                                        {/foreach}
                                                    </td>


                                                {/foreach}



                                            </tr>
                                                {/foreach}
                                        {/foreach}
                                    {/if}

                                    </tbody>

                                </table>
                            </section>
                        </div>
                    </section>
                </div>
            </div>

            <!-- page end-->
        </section>
    </section>
</form>