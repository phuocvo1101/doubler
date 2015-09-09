<script type="text/javascript">
    function answers()
    {
        var selectedanswer=document.getElementById("recordlimit").value;
        var frm = document.getElementById("frm");
        frm.action = "index.php?controller=productzanox&action=index&limit="+selectedanswer;
        frm.submit();
    }
</script>
<form id="frm" action="index.php?controller=productzanox&action=index" method="post">
<section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">

                          <header class="panel-heading">
                              <div class="row">
                                  <div class="col-xs-6 col-sm-6 placeholder">
                                      <h3 align="left"><span> Products Zanox</span></h3>
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
                                    {if isset($products)}
                                        {foreach $products as $key=>$item}
                                            <tr>
                                                <td>{$item['name']}</td>
                                                <td>{$item['description']}</td>
                                                
                                                <td>
                                                {if !empty($item['image']['small'])}
                                                	{assign var=url value=$item['image']['small']}
                                                {else}
                                                	{assign var=url value=$item['image']['medium']}
                                                {/if}
                                                 
                                                <img src="{$url}" width="150px" height="150px"/>
                                                </td>
                                                <td>
                                                	{$item['merchantProductId']}

                                                </td>
                                                <td><a target="_blank" href="{$item['trackingLinks']['trackingLink'][0]['ppc']}">Product Links</a>
                                                <td>{$item['program']['$']}</td>
                                                 <td>{$item['price']}</td>

                    
                    
                    
                                            </tr>
                                        {/foreach}
                                    {/if}
                    
                                    </tbody>
                                    <tr>
                                        <td colspan="2" align="right">
                    
                                            <ul class="pagination" align="center">
                    
                                                {if isset($listPage)}
                    
                                                    <li>{$listPage}</li>
                                                {/if}
                                            </ul>
                                        </td>
                                        <td colspan="6" align="center">
                                            <div>
                                                Page Size:
                                                <select id="recordlimit" onchange="answers();">
                                                    <option {if isset($limit) && $limit==10}selected="selected"{/if} value="10">10 </option>
                                                    <option {if isset($limit) && $limit==20}selected="selected"{/if} value="20">20 </option>
                                                    <option {if isset($limit) && $limit==50}selected="selected"{/if} value="50">50 </option>
                                                    <option {if isset($limit) && $limit==100}selected="selected"{/if} value="100">100 </option>
                                                    <option {if isset($limit) && $limit==$totalrecords}selected="selected"{/if} value="{$totalrecords}">All</option>
                                                </select>
                                                Total Record:<input type="text" size="2" value="{$totalrecords}" disabled="disabaled" />
                                                Total Page:<input type="text" size="2" value="{$totalpages}" disabled="disabaled"/>
                                            </div>
                    
                                        </td>
                                    </tr>
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