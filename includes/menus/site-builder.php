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
<!--            <div class="section">-->
<!--                <div class="sec-title">Main Parts</div>-->
<!--                <div class="sec-inner">-->
<!--                    <div class="button" @click="addHeader">Header</div>-->
<!--                    <div class="button" @click="addFooter">Footer</div>-->
<!--                    <div class="button" @click="addSidebar">Sidebar</div>-->
<!--                    <div class="button" @click="addMenu">Menu</div>-->
<!---->
<!--                </div>-->
<!--            </div>-->

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

            
            <div class="section" v-if="selectedElement.key">
                <div class="sec-title">Edit Element: {{selectedElement.name}}</div>
                <div class="sec-inner">
                    <div class="element-settings">
                        <template v-if="selectedElement.key == 'heading'">
                            <div class="input-wrap full">
                                <label>Heading Text</label>
                                <input type="text" v-model="selectedElement.text">
                            </div>
                            <div class="input-wrap full">
                                <label>Font Size</label>
                                <input type="text" v-model="selectedElement.fontSize">
                            </div>
                        </template>

                        <template v-if="selectedElement.key == 'paragraph'">
                            <div class="input-wrap full">
                                <label>Paragraph Text</label>
                                <textarea type="text" v-model="selectedElement.text"></textarea>
                            </div>
                            <div class="input-wrap full">
                                <label>Font Size</label>
                                <input type="text" v-model="selectedElement.fontSize">
                            </div>
                        </template>

                        <template v-else-if="selectedElement.key == 'button'">
                            <div class="input-wrap full">
                                <label>Button Text</label>
                                <input type="text" v-model="selectedElement.buttonText">
                            </div>
                            <div class="input-wrap full">
                                <label>Button Text</label>
                                <input type="text" v-model="selectedElement.href">
                            </div>
                            <div class="input-wrap full">
                                <label>Button Icon</label>
                                <input type="text" v-model="selectedElement.buttonIcon">
                            </div>
                            <div class="input-wrap full">
                                <label>Target</label>
                                <input type="text" v-model="selectedElement.target">
                            </div>
                        </template>

                        <template v-if="selectedElement.key == 'image'">
                            <div class="input-wrap full">
                                <label>Heading Text</label>
                                <input type="text" v-model="selectedElement.src">
                            </div>
                            <div class="input-wrap full">
                                <label>Width</label>
                                <input type="text" v-model="selectedElement.width">
                            </div>
                            <div class="input-wrap full">
                                <label>Height</label>
                                <input type="text" v-model="selectedElement.height">
                            </div>
                        </template>
                    </div>
                </div>
            </div>


            <div class="section" v-if="selectedContainerSettings.class">
                <div class="sec-title">Container Settings</div>
                <div class="sec-inner">
                    <div class="column-settings">
                        <template >
                            <div class="input-wrap full">
                                <label>Container Class</label>
                                <input type="text"  v-model="selectedContainerSettings.class">
                            </div>
                            <div class="input-wrap half">
                                <label>Container Margin Class</label>
                                <input type="text"  v-model="selectedContainerSettings.margin">
                            </div>
                            <div class="input-wrap half">
                                <label>Container Padding Class</label>
                                <input type="text"  v-model="selectedContainerSettings.padding">
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <div class="section" v-if="selectedRowSettings.class">
                <div class="sec-title">Row Settings</div>
                <div class="sec-inner">
                    <div class="row-settings">
                        <template >
                            <div class="input-wrap full">
                                <label>Row Class</label>
                                <input type="text"  v-model="selectedRowSettings.class">
                            </div>
                            <div class="input-wrap half">
                                <label>Row Margin Class</label>
                                <input type="text"  v-model="selectedRowSettings.margin">
                            </div>
                            <div class="input-wrap half">
                                <label>Row Padding Class</label>
                                <input type="text"  v-model="selectedRowSettings.padding">
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <div class="section" v-if="selectedColumnSettings.class">
                <div class="sec-title">Column Settings</div>
                <div class="sec-inner">

                    <div class="column-settings">

                        <template >
                            <div class="input-wrap full">
                                <label>Column Class</label>
                                <input type="text"  v-model="selectedColumnSettings.class">
                            </div>
                            <div class="input-wrap half">
                                <label>Column Margin Class</label>
                                <input type="text"  v-model="selectedColumnSettings.margin">
                            </div>
                            <div class="input-wrap half">
                                <label>Column Padding Class</label>
                                <input type="text"  v-model="selectedColumnSettings.padding">
                            </div>
                        </template>
                    </div>
                </div>
            </div>






<!--            <div class="section">-->
<!--                <div class="sec-inner">-->
<!--                    <p>Container: {{selectedContainer}}</p>-->
<!--                    <p>Row: {{selectedRow}}</p>-->
<!--                    <p>Column: {{selectedColumn}}</p>-->
<!--                </div>-->
<!--            </div>-->





        </div>
        <div  class="nav-preview">
            <template class="" v-for="(container, i) in containers">
                <div :index="i" :class="[container.class, container.margin, container.padding, isActiveContainer(i)]" @click="selectContainer(i)">
                    <div class="container-action">
                        <!--                        <div title="Delete Row" class="action-item sort"><i class="fas fa-bars"></i></div>-->
                        <div title="Add Row" class="action-item add-row-local" @click="addRow(selectedContainer)"><i class="far fa-object-ungroup"></i></div>
                        <div title="Delete Container" class="action-item remove" @click="removeContainer(i)" ><i class="fas fa-times"></i></div>
                        <div title="Container Settings" class="action-item container-settings" @click="containerSettings(i)"><i class="fas fa-cog"></i></div>
                    </div>

                    <template class="" v-for="(row, j) in container.rows">
                        <div :index="j" :class="[row.class, row.margin, row.padding, isActiveRow(i,j)]" @click="selectRow(i,j)">
                            <div class="row-action">
        <!--                        <div title="Delete Row" class="action-item sort"><i class="fas fa-bars"></i></div>-->
                                <div title="Add Column" class="action-item add-column-local" @click="addColumn(i,j)"><i class="fas fa-columns"></i></div>
                                <div title="Delete Row" class="action-item remove" @click="removeRow(i,j)" ><i class="fas fa-times"></i></div>
                                <div title="Row Settings" class="action-item row-settings" @click="rowSettings(i,j)"><i class="fas fa-cog"></i></div>
                            </div>

                            <template class="" v-for="(column, k) in row.columns" >
                                <div :index="k" :class="[column.class, column.margin, column.padding, isActiveColumn(i,j,k)]" @click="selectColumn(i,j,k)" >
                                    <div class="col-action">
        <!--                                <div class="sort action-item"><i class="fas fa-bars"></i></div>-->
                                        <div title="Delete Column" class="remove action-item" @click="removeColumn(i,j,k)" ><i class="fas fa-times"></i></div>
                                        <div title="Duplicate Column" class="duplicate-column action-item" @click="duplicateColumn(i,j,k)" ><i class="fas fa-clone"></i></div>
                                        <div title="Column Settings" class="action-item col-settings" @click="columnSettings(i,j,k)"><i class="fas fa-cog"></i></div>
                                    </div>


<!--                                    <h3>{{ i }} : {{ j }} : {{ k }}</h3>-->

                                    <div :class="['sb-element']" v-for="(columnElement, elementIndex) in column.columnElements">
                                        <div class="element-action">
                                            <div title="Element Settings" class="action-item" @click="selectElement(i,j,k,elementIndex)" ><i class="fas fa-cog"></i></div>
                                            <div title="Delete Element" class="remove action-item" @click="deleteElement(i,j,k,elementIndex)" ><i class="fas fa-times"></i></div>
                                        </div>
                                        <template v-if="columnElement.key == 'button'">
                                            <div class="sb-button">
                                                <a :class="[columnElement.class]" :href="columnElement.href">{{columnElement.buttonText}}</a>
                                            </div>
                                        </template>
                                        <template v-else-if="columnElement.key == 'heading'">
                                            <h2 class="sb-heading" :style="{'font-size':columnElement.fontSize}">
                                                {{columnElement.text}}
                                            </h2>
                                        </template>

                                        <template v-else-if="columnElement.key == 'paragraph'">
                                            <p class="sb-heading" :style="{'font-size':columnElement.fontSize}">
                                                {{columnElement.text}}
                                            </p>
                                        </template>

                                        <template v-else-if="columnElement.key == 'video'">
                                            <div class="sb-video">
                                                <iframe :src="columnElement.src" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                            </div>
                                        </template>

                                        <template v-else-if="columnElement.key == 'image'">
                                            <div class="sb-image">
                                                <img :src="columnElement.src" :style="{width:columnElement.width, height:columnElement.height}">
                                            </div>
                                        </template>

                                        <template v-else-if="columnElement.key == 'logo'">
                                            <div class="sb-logo">
                                                <img :src="columnElement.img_src" :style="{width:columnElement.width, height:columnElement.height}">
                                            </div>
                                        </template>


                                    </div>
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

            selectedObject: "",
            selectedContainer: 0,
            selectedContainerSettings: [],
            selectedRow: [0,0],
            selectedRowSettings: [],
            selectedColumn: [0,0,0],
            selectedColumnSettings: [],

            selectedElement: [],
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
                        columnElements: [],
                    }]
                }],

            }],

            elements: {
                post: {
                    groupName: 'Post',
                    groupKey: 'post',
                    items: {
                        image:{key:"image", name: "Image"},
                        button:{key:"button", name: "Button"},
                        heading:{key:"heading",name: "Heading"},
                        paragraph:{key:"paragraph",name: "Paragraph"},

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
            addMenu: function(){
            },

            accordionToggleClass: function(){

                if(this.accordionIsActive == 'active'){
                    this.accordionIsActive = '';

                }else{
                    this.accordionIsActive = 'active';
                }
            },

            addElement: function(groupKey, item_key){

               var i = this.selectedColumn[0];
               var j = this.selectedColumn[1];
               var k = this.selectedColumn[2];

                element_data = this.elements[groupKey].items[item_key];

                if(item_key == "video"){
                    var element_data = {key:"video", name: "Video"};
                }else if(item_key == "image"){
                    var element_data = {key:"image", name: "Image", src:"https://images.pexels.com/photos/36764/marguerite-daisy-beautiful-beauty.jpg?cs=srgb&dl=bloom-blossom-close-up-36764.jpg", width:"100%", height: "auto"};
                }else if(item_key == "button"){
                    var element_data = {
                        key:"button",
                        name: "Button",
                        class:"btn btn-primary",
                        style:{
                            idle:{
                                display:"inline-block",
                                padding:{top:"10px",right:"10px",bottom:"10px",left:"10px"},
                                margin:{top:"0px",right:"0px",bottom:"0px",left:"0px"},
                                backgroundColor:"#007bff",
                                border:{top:"",right:"",bottom:"",left:""},
                            },
                            hover:{
                                display:"inline-block",
                                padding:{top:"10px",right:"10px",bottom:"10px",left:"10px"},
                                margin:{top:"0px",right:"0px",bottom:"0px",left:"0px"},
                                backgroundColor:"#007bff",
                                border:{top:"",right:"",bottom:"",left:""},
                            },

                        },
                        isLink:"yes",
                        href:"https://www.youtube.com",
                        target:"_blank",
                        buttonText:"Button Text",
                        buttonIcon:"Icons"};
                }else if(item_key == "heading"){
                    var element_data = {key:"heading", name: "Heading", text:"This is Heading", fontSize:"28px"};
                }else if(item_key == "logo"){
                    var element_data = {key:"logo", name: "Logo", type:"image",img_src:"http://www.gostudiorama.com/wp-content/uploads/2018/06/letter-based-logo-design-10-years-100-logo-design-projects-on-behance-fonts-for-business-logos.png", width:"100%", height: "auto"};
                }else if(item_key == "paragraph"){
                    var element_data = {key:"paragraph", name: "Paragraph", text:"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.", fontSize:"14px"};
                }









                this.containers[i].rows[j].columns[k].columnElements.push(element_data);
                //console.log(this.elements[groupKey].items[item_key]);

            },

            isActiveContainer: function(i){

                if(this.selectedContainer == i){
                    return 'active';
                }
            },

            isActiveRow: function(i,j){

                if(this.selectedContainer == i){
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
                            columnElements: [],

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
                        columnElements: [],
                    }]
                })
            },
            addColumn: function(i,j){
                this.containers[i].rows[j].columns.push({
                    class: 'sb-col col',
                    margin: 'm-1',
                    padding: 'p-1',
                    columnElements: [],
                })
            },

            duplicateColumn: function(i,j,k){

                console.log(this.containers[i].rows[j].columns[k]);

                copied = this.containers[i].rows[j].columns[k];

                this.containers[i].rows[j].columns.push(copied)




            },



            getUniqueId: function(){
                return new Date().getTime();
            },

            selectContainer: function(i){
                this.selectedContainer = i;

                this.selectedObject = "container";

                console.log('selectContainer');

            },

            selectRow: function(i,j){
                this.selectedRow = [i,j];
                this.selectedObject = "row";

                console.log('selectRow');
            },

            removeContainer: function(i){
                this.containers.splice(i, 1);
            },

            removeRow: function(i,j){
                this.containers[i].rows.splice(j, 1)
            },
            selectColumn: function(i,j,k){

                this.selectedColumn = [i,j,k];

                this.selectedObject = "column";

                console.log('selectColumn');
            },
            selectElement: function(i,j,k, elementIndex){
                var target = this.containers[i].rows[j].columns[k].columnElements[elementIndex];
                this.selectedElement = target;
                this.selectedObject = "element";

                console.log('selectElement');
            },

            rowSettings: function(i,j){
               var target = this.containers[i].rows[j];
                this.selectedRowSettings = target;
            },

            columnSettings: function(i,j,k){

               var  target = this.containers[i].rows[j].columns[k];
                this.selectedColumnSettings = target;
            },

            containerSettings: function(i){

              var  target = this.containers[i];
                this.selectedContainerSettings = target;
            },







            removeColumn: function(i,j,k){
                this.containers[i].rows[j].columns.splice(k, 1)
            },
            deleteElement: function(i,j,k,elementIndex){
                this.containers[i].rows[j].columns[k].columnElements.splice(elementIndex, 1);

                this.selectedElement = [];

            },



        }

    })
</script>