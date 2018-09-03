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
                    <div class="add-container button" @click="addContainer()">Add Container</div>
                    <div class="add-row button" @click="addRow(selectedContainer)">Add Row</div>
                    <div class="add-column button" @click="addColumn(selectedRow[0],selectedRow[1])">Add Column</div>
                </div>
            </div>

            <div class="section">
                <div class="sec-title">Elements</div>
                <div class="sec-inner">
                    <div class="elements-list accoridon">
                    <template v-for="(element_group, index) in elements">

                        <div :class="[accordionIsActive, 'accoridonGroup']" >
                            <div :index="index" :class="['group-title']" @click="accordionToggleClass()" >
                                {{element_group.groupName}}
                            </div>
                            <div class="group-content" >

                                <template class="" v-for="(item, item_key) in element_group.items">

                                    <span :itemKey="item_key" class="button" @click="addElement(element_group.groupKey, item_key)"> {{ item.name }}</span>

                                </template>


                            </div>
                        </div>

                    </template>



                    </div>

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
                <div :index="i" :class="[container.class, container.margin, container.padding, isActiveContainer(i)]" @click="selectContainer(i)">
                    <div class="container-action">
                        <!--                        <div title="Delete Row" class="action-item sort"><i class="fas fa-bars"></i></div>-->
                        <div title="Add Row" class="action-item add-row-local" @click="addRow(selectedContainer)"><i class="far fa-object-ungroup"></i></div>
                        <div title="Delete Container" class="action-item remove" @click="removeContainer(i)" ><i class="fas fa-times"></i></div>
                        <div title="Container Settings" class="action-item container-settings">
                            <i class="fas fa-cog"></i>

                            <div class="container-settings-wrap">
                                <div class="input-wrap full">
                                    <label>Container Class</label>
                                    <input type="text" value="10px" v-model="container.class">
                                </div>

                            </div>
                        </div>
                    </div>



                    <template class="" v-for="(row, j) in container.rows">
                        <div :index="j" :class="[row.class, row.margin, row.padding, isActiveRow(i,j)]" @click="selectRow(i,j)">
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
                                <div :index="k" :class="[column.class, column.margin, column.padding, isActiveColumn(i,j,k)]" @click="selectColumn(i,j,k)" >
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
<!--                                    <h3>{{ i }} : {{ j }} : {{ k }}</h3>-->

                                    <div :class="['sb-element']" v-for="item in column.items">

                                        <div class="element-action">
                                            <div title="Element Settings" class="action-item"  ><i class="fas fa-cog"></i></div>
                                        </div>



                                        <template v-if="item.key=='image'">

                                            <div class=" sb-image">
                                                <img :style="{width:item.width,height:item.height}" :src="item.src"/>
                                            </div>



                                            <input type="text" v-model="item.src">

                                        </template>

                                        <template v-if="item.key=='video'">

                                            <div class="">Video HTML</div>

                                        </template>

                                        <template v-if="item.key=='button'">

                                            <div class="sb-button">
                                                <a :href="item.href">{{item.buttonText}}</a>
                                            </div>

                                            <input type="text" v-model="item.buttonText">
                                            <input type="text" v-model="item.href">

                                        </template>

                                        <template v-if="item.key=='heading'">

                                            <div class="sb-button">Heading HTML</div>

                                        </template>












                                    </div>



                                </div>

                            </template>

                        </div>


                    </template>

                </div>
            </template>

        </div>

        <pre>{{containers}}</pre>

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
            accordionIsActive: '',

            containers: [{
                class: 'sb-container container',
                margin: 'my-1',
                padding: 'py-1',

                rows: [{
                    class: 'sb-row row',
                    margin: 'm-1',
                    padding: 'p-1',
                    columns: [{
                        class: 'sb-col col',
                        margin: 'm-1',
                        padding: 'p-1',
                        items: [
                            {key:"button", name: "Button", isLink:"yes", href:"https://www.youtube.com", target:"_blank", buttonText:"Button Text", buttonIcon:"Icons"},
                            {key:"button", name: "Button", isLink:"yes", href:"https://www.youtube.com", target:"_blank", buttonText:"Button Text", buttonIcon:"Icons"},
                            {key:"button", name: "Button", isLink:"yes", href:"https://www.youtube.com", target:"_blank", buttonText:"Button Text", buttonIcon:"Icons"},

                        ],
                    }]
                }],

            }],






            elements: {
                post: {
                    groupName: 'Post',
                    groupKey: 'post',
                    items: {
                        image:{key:"image", name: "Image", src:"https://images.pexels.com/photos/36764/marguerite-daisy-beautiful-beauty.jpg?cs=srgb&dl=bloom-blossom-close-up-36764.jpg", width:"100%", height: "auto"},
                        video:{key:"video",name: "Video"},
                        button:{key:"button", name: "Button", isLink:"yes", href:"https://www.youtube.com", target:"_blank", buttonText:"Button Text", buttonIcon:"Icons"},
                        heading:{key:"heading",name: "Heading", content:"This is Heading"},




                    }

                },


            },

        },
        methods:{

            addHeader: function(){

            },
            addFooter: function(){

            },
            addSidebar: function(){

            },

            accordionToggleClass: function(){




                if(this.accordionIsActive == 'active'){
                    this.accordionIsActive = '';

                }else{

                    this.accordionIsActive = 'active';
                }




            },









            addElement: function(groupKey, item_key){

                i = this.selectedColumn[0];
                j = this.selectedColumn[1];
                k = this.selectedColumn[2];

                this.containers[i].rows[j].columns[k].items.push(this.elements[groupKey].items[item_key])




                console.log(this.elements[groupKey].items[item_key]);

            },




            isActiveContainer: function(i){

                if(this.selectedContainer == i){
                    return 'active';
                }
            },

            isActiveRow: function(i,j){

                if(this.selectedContainer == i){

                   // console.log(this.selectedRow[1]);

                    if(this.selectedRow[1] == j){
                        return 'active';
                    }


                }
            },

            isActiveColumn: function(i,j,k){

                if(this.selectedContainer == i){


                    if(this.selectedRow[1] == j){

                        if(this.selectedColumn[2] == k){
                            return 'active';
                        }

                    }


                }
            },







            addContainer: function(){

                this.containers.push({
                    class: 'sb-container container',
                    margin: 'my-1',
                    padding: 'py-1',

                    rows: [{
                        class: 'sb-row row',
                        margin: 'm-1',
                        padding: 'p-1',
                        columns: [{
                            class: 'sb-col col',
                            margin: 'm-1',
                            padding: 'p-1',
                            items: [],

                        }]

                    }],

                })

            },




            addRow: function(i){

                this.containers[i].rows.push({
                    class: 'sb-row row',
                    margin: 'm-1',
                    padding: 'p-1',
                    columns: [{
                        class: 'sb-col col',
                        margin: 'm-1',
                        padding: 'p-1',
                        items: [],

                    }]

                })

            },
            addColumn: function(i,j){

                this.containers[i].rows[j].columns.push({

                    class: 'sb-col col',
                    margin: 'm-1',
                    padding: 'p-1',
                    items: [],

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

            removeContainer: function(i){
                this.containers.splice(i, 1)
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