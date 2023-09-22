import{A as I}from"./AppLayout-b94b5261.js";import{i as B,T,j as o,o as s,c as m,w as d,a as e,d as a,h as V,b as i,e as _,n as f,g as p,F as x,f as h,t as y,M as A}from"./app-96571986.js";import{a as C,_ as N}from"./TextInput-a5052a98.js";import{_ as E}from"./InputLabel-d0dfaf88.js";import{_ as M}from"./PrimaryButton-7c584cb6.js";import{_ as j}from"./_plugin-vue_export-helper-c27b6911.js";const P={components:{AppLayout:I,Link:B,InputError:C,InputLabel:E,TextInput:N,PrimaryButton:M},props:{levels:Object},data(){return{form:T({name:""})}},methods:{submit(){this.form.post("/levels")}}},D={class:"bg-gray-100 flex-1 p-6 md:mt-16"},F={class:"mt-6 max-w-3xl mx-auto py-10 sm:px-6 lg:px-8"},H=e("div",null,[e("h3",{class:"text-lg font-medium text-gray-900"}," All Levels "),e("p",{class:"mt-1 mb-5 text-sm text-gray-600"}," Manage all the information of system levels here ")],-1),S={class:"px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md"},q={key:0,class:"mb-12"},z=e("div",{class:"my-3"},[e("h5",{class:"font-bold text-sm"}," Create new level: ")],-1),O={class:"flex justify-around items-baseline"},U={class:"flex flex-col w-2/3"},G={class:"flex items-baseline"},J={key:1,class:"relative overflow-x-auto"},K={class:"w-full text-sm text-left text-gray-500"},Q=e("thead",{class:"text-xs text-gray-700 uppercase bg-gray-50"},[e("tr",null,[e("th",{scope:"col",class:"px-6 py-3"},"#"),e("th",{scope:"col",class:"px-6 py-3"}," Name "),e("th",{scope:"col",class:"px-6 py-3"}," Actions ")])],-1),R={scope:"row",class:"px-6 py-4 font-medium whitespace-nowrap"},W={class:"px-6 py-4"},X={class:"px-6 py-4"},Y={key:2,class:"text-center"},Z={class:"mt-6 display:inline-block"};function $(n,r,c,ee,l,u){const v=o("InputLabel"),b=o("TextInput"),g=o("InputError"),w=o("PrimaryButton"),L=o("Link"),k=o("AppLayout");return s(),m(k,null,{default:d(()=>[e("div",D,[e("div",null,[e("div",F,[H,e("div",S,[n.can("create levels")?(s(),a("div",q,[z,e("form",{onSubmit:r[1]||(r[1]=V((...t)=>u.submit&&u.submit(...t),["prevent"]))},[e("div",O,[e("div",U,[e("div",G,[i(v,{class:"mr-4",for:"name",value:"name:"}),i(b,{id:"name",modelValue:l.form.name,"onUpdate:modelValue":r[0]||(r[0]=t=>l.form.name=t),type:"text",class:"mt-1 block w-full",required:"",autocomplete:"name"},null,8,["modelValue"])]),i(g,{message:l.form.errors.name,class:"mt-2"},null,8,["message"])]),e("div",null,[i(w,{class:f({"opacity-25":l.form.processing}),disabled:l.form.processing},{default:d(()=>[_(" create ")]),_:1},8,["class","disabled"])])])],32)])):p("",!0),c.levels.data.length!==0&&n.can("read levels")?(s(),a("div",J,[e("table",K,[Q,e("tbody",null,[(s(!0),a(x,null,h(c.levels.data,t=>(s(),a("tr",{key:t.id,class:"bg-white border-b"},[e("td",R,y(t.id),1),e("td",W,y(t.name),1),e("td",X,[n.can("update levels")?(s(),m(L,{key:0,class:"text-yellow-700 font-bold",href:n.route("levels.edit",t.id)},{default:d(()=>[_("Edit")]),_:2},1032,["href"])):p("",!0)])]))),128))])])])):(s(),a("div",Y," No levels have been created yet. ")),e("div",null,[e("div",Z,[c.levels.data.length!==0?(s(!0),a(x,{key:0},h(c.levels.links,t=>(s(),m(A(t.url?"Link":"span"),{href:t.url,innerHTML:t.label,class:f(["px-2",{"text-gray-500":!t.url,"font-bold":t.active}])},null,8,["href","innerHTML","class"]))),256)):p("",!0)])])])])])])]),_:1})}const re=j(P,[["render",$]]);export{re as default};
