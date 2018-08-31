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
                    <div class="add-container button" @click="addContainer">Add Container</div>
                    <div class="add-row button" @click="addRow(selectedContainer)">Add Row</div>
                    <div class="add-column button" @click="addColumn(selectedRow[0],selectedRow[1])">Add Column</div>
                </div>
            </div>

            <div class="section">
                <div class="sec-inner">
                    <p>Container: {{selectedContainer}}</p>
                    <p>Row: {{selectedRow}}</p>
                    <p>Column: {{selectedColumn}}</p>
                </div>


            </div>



        </div>
        <div  class="nav-preview">


            <template class="" v-for="(container, i) in containers">
                <div :index="i" :class="[container.class, container.margin, container.padding]" class="" @click="selectContainer(i)">

                    <template class="" v-for="(row, j) in container.rows">
                        <div :index="j" :class="[row.class, row.margin, row.padding]" @click="selectRow(i,j)">
                            <div class="row-action">
        <!--                        <div title="Delete Row" class="action-item sort"><i class="fas fa-bars"></i></div>-->
                                <div title="Add Column" class="action-item add-column-local" @click="addColumn(i,j)"><i class="fas fa-columns"></i></div>
                                <div title="Delete Row" class="action-item remove" @click="removeRow(j)" ><i class="fas fa-times"></i></div>
                                <div title="Row Settings" class="action-item row-settings">
                                    <i class="fas fa-cog"></i>

                                    <div class="row-settings-wrap">
                                        <div class="input-wrap full">
                                            <label>Row Class</label>
                                            <input type="text" value="10px" v-model="row.class">
                                        </div>
                                        <div class="input-wrap half">
                                            <label>Column Margin Class</label>
                                            <input type="text" value="10px" v-model="row.margin">
                                        </div>
                                        <div class="input-wrap half">
                                            <label>Column Padding Class</label>
                                            <input type="text" value="10px" v-model="row.padding">
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <template class="" v-for="(column, k) in row.columns" >
                                <div :index="k" :class="[column.class, column.margin, column.padding]" @click="selectColumn(i,j,k)" >
                                    <div class="col-action">
        <!--                                <div class="sort action-item"><i class="fas fa-bars"></i></div>-->
                                        <div title="Delete Column" class="remove action-item" @click="removeColumn(i,j,k)" ><i class="fas fa-times"></i></div>
                                        <div title="Row Settings" class="action-item col-settings">
                                            <i class="fas fa-cog"></i>

                                            <div class="col-settings-wrap">
                                                <div class="input-wrap full">
                                                    <label>Column Class</label>
                                                    <input type="text" value="10px" v-model="column.class">
                                                </div>
                                                <div class="input-wrap half">
                                                    <label>Column Margin Class</label>
                                                    <input type="text" value="10px" v-model="column.margin">
                                                </div>
                                                <div class="input-wrap half">
                                                    <label>Column Padding Class</label>
                                                    <input type="text" value="10px" v-model="column.padding">
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                    <h3>{{ i }} : {{ j }} : {{ k }}</h3>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.


                                </div>

                            </template>

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

            selectedContainer: 0,
            selectedRow: [0,0],
            selectedColumn: [0,0,0],

            containers: [{
                class: 'sb-container container py-1 my-1',
                rows: [{
                    class: 'sb-row row',
                    margin: 'm-1',
                    padding: 'p-1',
                    columns: [{
                        class: 'sb-col col',
                        margin: 'm-1',
                        padding: 'p-1',
                        items: [{}],

                    }]

                }],

            }],

        },
        methods:{

            addHeader: function(){

            },
            addFooter: function(){

            },
            addSidebar: function(){

            },



            addContainer: function(i){




                this.containers.push({
                    class: 'sb-container container py-1 my-1',
                    rows: [{
                        class: 'sb-row row',
                        margin: 'm-1',
                        padding: 'p-1',
                        columns: [{
                            class: 'sb-col col',
                            margin: 'm-1',
                            padding: 'p-1',
                            items: [{}],

                        }]

                    }],

                })

            },




            addRow: function(i,j){

                this.containers[i].rows.push({
                    class: 'sb-row row',
                    margin: 'm-1',
                    padding: 'p-1',
                    columns: [{
                        class: 'sb-col col',
                        margin: 'm-1',
                        padding: 'p-1',
                        items: [{}],

                    }]

                })

            },
            addColumn: function(i,j){

                console.log(i);
                console.log(j);

                this.containers[i].rows[j].columns.push({

                    class: 'sb-col col',
                    margin: 'm-1',
                    padding: 'p-1',
                    items: [{}],

                })






            },

            getUniqueId: function(){

                return new Date().getTime();
            },

            selectContainer: function(i){

                this.selectedContainer = i;
            },

            selectRow: function(i,j){

                this.selectedRow = [i,j];;
            },

            removeRow: function(i,j){
                this.containers[i].rows.splice(j, 1)
            },
            selectColumn: function(i,j,k){

                this.selectedColumn = [i,j,k];
            },


            removeColumn: function(i,j,k){
                this.containers[i].rows[j].columns.splice(k, 1)
            },
        }

    })
</script>