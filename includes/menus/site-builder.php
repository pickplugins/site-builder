<?php	


/*
* @Author 		PickPlugins
* Copyright: 	2015 PickPlugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 



?>
<div class="wrap">

    <div class="site-builder" id="site-builder">





        <div class="nav-tools">

            <div class="section">
                <div class="sec-title">Main Parts</div>
                <div class="sec-inner">
                    <div class="button" @click="addHeader">Header</div>
                    <div class="button" @click="addFooter">Footer</div>
                    <div class="button" @click="addSidebar">Sidebar</div>

                </div>
            </div>

            <div class="section">
                <div class="sec-title">Column & Row</div>
                <div class="sec-inner">
                    <div class="add-row button" @click="addRow">Add Row</div>
                    <div class="add-column button" @click="addColumn(selectedRow)">Add Column</div>
                </div>
            </div>

            <div class="section">


            </div>



        </div>
        <div  class="nav-preview">




            <template class="" v-for="(row, i) in rows" v-sortable="{ handle: '.sort' }">
                <div :index="i" :class="row.class" @click="selectRow(i)"  >
                    <div class="row-action">
                        <span class="sort"><i class="fas fa-bars"></i></span>
                        <span class="add-column-local" @click="addColumn(i)"><i class="fas fa-columns"></i></span>
                        <span class="remove" @click="removeRow(i)" ><i class="fas fa-times"></i></span>
                    </div>

                    <template class="" v-for="(column, j) in row.columns" >
                        <div :index="j" :class="column.class" @click="selectColumn(i,j)" >
                            <div class="col-action">
                                <span class="sort"><i class="fas fa-bars"></i></span>
                                <span class="remove" @click="removeColumn(i,j)" ><i class="fas fa-times"></i></span>
                            </div>
                            <h3>{{ i }} : {{ j }}</h3>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.


                        </div>

                    </template>

                </div>


            </template>

        </div>


    </div>

</div>



<script>



    var app = new Vue({
        el: '#site-builder',
        data: {

            activeObj: [{
                index:'',
            }],

            selectedRow: 0,
            selectedColumn: [{}],

            rows: [{
                class: 'sb-row row m-1',
                columns: [{
                    class: 'sb-col col m-1',

                }]

            }],

        },
        methods:{

            addHeader: function(){

            },
            addFooter: function(){

            },
            addSidebar: function(){

            },

            addRow: function(){



                this.rows.push({
                    class: 'sb-row row m-1',
                    columns: [{
                        class: 'sb-col col m-1',

                    }]

                })

            },
            addColumn: function(i){


            console.log(this.rows[this.selectedRow]);

                this.rows[i].columns.push({

                    class: 'sb-col col m-1',

                })
            },

            getUniqueId: function(){

                return new Date().getTime();
            },
            selectRow: function(i){

                this.selectedRow = i;


            },

            removeRow: function(i){

                console.log(this.rows.splice(i, 1));


            },
            selectColumn: function(i,j){

                console.log(this.selectedColumn);

                this.selectedColumn = [{i,j}];

                console.log(i);
                console.log(j);

            },


            removeColumn: function(i,j){

                console.log(this.rows[i].columns.splice(j, 1));
                console.log(i);
                console.log(j);

            },






        }





    })
</script>