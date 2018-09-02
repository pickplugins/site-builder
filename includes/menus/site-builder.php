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
                <div class="sec-title">Elements</div>
                <div class="sec-inner">
                    <div class="elements-list accoridon">
                    <template v-for="(element_group, index) in elements">
                        <template v-for="(group_data, group_data_key) in element_group">
                            <template v-for="(group, group_key) in group_data">

                                <div :index="group_data_key" :class="['group-title']" @click="accordionToggleClass(group_data_key)" >
                                    {{group.groupName}}
                                </div>
                                <div class="group-content" >

                                    <template class="" v-for="(item, item_key) in group.items">

                                        <span :itemKey="group_data_key" v-for="(item_data, item_data_key) in item" class="button" @click="addElement(group_data_key, item_data_key)"> {{ item_data.name }}</span>

                                    </template>


                                </div>

                            </template>



                        </template>


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
                        <div title="Add Row" class="action-item add-row-local" @click="addRow(selectedContainer)"><i class="fas fa-layer"></i></div>
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
                                    <h3>{{ i }} : {{ j }} : {{ k }}</h3>

                                    <div :class="['sb-element']" v-for="item in column.items">


                                        {{item.item_data_key}}
                                    </div>
                                    Lorem Ipsum is simply dummy text


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
                        items: [{}],
                    }]
                }],

            }],






            elements: [{
                post: [{
                    groupName: 'Post',
                    items: [{
                        postTitle:{name: "Post Title"},
                        postExcerpt:{name: "Post excerpt"},
                        postContent:{name: "Post Content"},
                        readMore:{name: "Read more"},
                        featuredImage:{name: "Featured image"},
                        postDate:{name: "Post date"},
                        authorAvatar:{name: "Author avatar"},
                        author:{name: "Author"},
                        categories:{name: "Post categories"},
                        tags:{name: "Post tags"},
                        commentsCount:{name: "Comments count"},
                        customField:{name: "Custom Field"},
                        customTaxonomy:{name: "Custom taxonomy"},
                        postComments:{name: "Post comments"},




                    }]

                }],

                woocommerce: [{
                    groupName: 'WooCommerce',
                    items: [{

                        wcFullPrice:{name: "Product full price"},
                        wcRegularPrice:{name: "Regular price"},
                        wcSalePrice:{name: "Sale price"},
                        wcProductGallery:{name: "Product gallery"},
                        wcAddtoCart:{name: "Add to cart"},
                        wcStarRating:{name: "Star rating"},
                        wcTextRating:{name: "Text rating"},
                        wcCategories:{name: "Product categories"},
                        wcTags:{name: "Product tags"},
                        wcSKU:{name: "Product SKU"},
                        wcCategoryThumbnail:{name: "Category Thumbnail"},
                        wcCategoryDescription:{name: "Category description"},

                    }]

                }],


                others: [{
                    groupName: 'Others',
                    items: [{

                        HTML:{name: "Custom HTML"},


                    }]

                }],

            }],

            columnElements: [{}],


        },
        methods:{

            addHeader: function(){

            },
            addFooter: function(){

            },
            addSidebar: function(){

            },

            accordionToggleClass: function(group_key){

                console.log(group_key);
            },









            addElement: function(group_key, item_data_key){

               i = this.selectedColumn[0];
                j = this.selectedColumn[1];
                k = this.selectedColumn[2];

                this.containers[i].rows[j].columns[k].items.push({item_data_key})


                console.log(this.containers);

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







            addContainer: function(i){

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