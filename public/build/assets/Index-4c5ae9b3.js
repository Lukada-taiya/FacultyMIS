import{A as B}from"./AppLayout-e8d84490.js";import{i as I,T as S,j as d,o as t,c as x,w as g,a as e,d as r,h as z,b as l,m as y,N as v,F as m,f as u,t as f,e as b,g as w,n as V,M as U}from"./app-6c5b59c0.js";import{a as A,_ as N}from"./TextInput-76c7f515.js";import{_ as E}from"./InputLabel-c375f544.js";import{_ as M}from"./PrimaryButton-ef9bfa48.js";import{_ as q}from"./SecondaryButton-a051a45d.js";import{_ as O}from"./_plugin-vue_export-helper-c27b6911.js";const D={components:{AppLayout:B,Link:I,InputError:A,InputLabel:E,TextInput:N,PrimaryButton:M,SecondaryButton:q},props:{courses:Object,programmes:Object,semesters:Object,lecturers:Object},data(){return{form:S({name:"",code:"",semester:"",lecturer:"",addedPrograms:[]}),courseType:["core","elective"]}},methods:{submit(){let n=!1;for(const a of this.form.addedPrograms)a.programme==0&&(a.errors.programme="This field is required",n=!0),a.type==0&&(a.errors.type="This field is required",n=!0);n||this.form.post("/courses")},addProgram(){this.form.addedPrograms.push({programme:"",type:"",errors:{type:"",programme:""}})},removeProgram(){this.form.addedPrograms.pop()}}},F={class:"bg-gray-100 flex-1 p-6 md:mt-16"},H={class:"mt-6 max-w-3xl mx-auto py-10 sm:px-6 lg:px-8"},R=e("div",null,[e("h3",{class:"text-lg font-medium text-gray-900"}," All Courses "),e("p",{class:"mt-1 mb-5 text-sm text-gray-600"}," Manage all the information of system courses here ")],-1),G={class:"px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md"},J={key:0,class:"mb-12"},K=e("div",{class:"my-3"},[e("h5",{class:"font-bold text-sm"}," Create new course: ")],-1),Q={class:"flex flex-col justify-start gap-5 flex-wrap items-start"},W={class:"flex justify-around w-full gap-5"},X={class:"flex flex-col"},Y={class:"flex justify-between items-baseline"},Z={class:"flex flex-col"},$={class:"flex justify-between items-baseline"},ee={class:"flex justify-around gap-5 w-full"},se={class:"flex flex-col"},te={class:"flex justify-between items-baseline"},oe={class:"flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"},re=e("option",{value:"",disabled:"",hidden:"",selected:""}," Select lecturer... ",-1),le=["value"],ae={class:"flex flex-col"},ie={class:"flex items-baseline"},ne={class:"flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"},ce=e("option",{value:"",disabled:"",hidden:"",selected:""}," Select semester... ",-1),de=["value"],me={class:"flex justify-evenly mt-5 w-full text-center"},ue={class:"flex flex-col"},fe={class:"flex items-baseline"},pe={class:"flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"},_e=["onUpdate:modelValue"],ge=e("option",{value:"",disabled:"",hidden:"",selected:""}," Select programme... ",-1),he=["value"],xe={class:"flex flex-col"},ye={class:"flex items-baseline"},ve={class:"flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"},be=["onUpdate:modelValue"],we=e("option",{value:"",disabled:"",hidden:"",selected:""}," Select type... ",-1),ke=["value"],Pe={class:"flex justify-center w-full"},Ve={key:1,class:"relative overflow-x-auto"},je={class:"w-full text-sm text-left text-gray-500 dark:text-gray-400"},Le=e("thead",{class:"text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"},[e("tr",null,[e("th",{scope:"col",class:"px-6 py-3"},"#"),e("th",{scope:"col",class:"px-6 py-3"}," Name "),e("th",{scope:"col",class:"px-6 py-3"}," Code "),e("th",{scope:"col",class:"px-6 py-3"}," Actions ")])],-1),Ce={scope:"row",class:"px-6 py-4 font-medium whitespace-nowrap dark:text-white"},Te={class:"px-6 py-4"},Be={class:"px-6 py-4"},Ie={class:"px-6 py-4"},Se={key:2,class:"text-center"},ze={class:"mt-6 display:inline-block"};function Ue(n,a,c,Ae,o,h){const p=d("InputLabel"),k=d("TextInput"),_=d("InputError"),P=d("SecondaryButton"),j=d("PrimaryButton"),L=d("Link"),C=d("AppLayout");return t(),x(C,null,{default:g(()=>[e("div",F,[e("div",null,[e("div",H,[R,e("div",G,[n.can("create courses")?(t(),r("div",J,[K,e("form",{onSubmit:a[4]||(a[4]=z((...s)=>h.submit&&h.submit(...s),["prevent"]))},[e("div",Q,[e("div",W,[e("div",X,[e("div",Y,[l(p,{class:"mr-4",for:"name",value:"name:"}),l(k,{id:"name",modelValue:o.form.name,"onUpdate:modelValue":a[0]||(a[0]=s=>o.form.name=s),type:"text",class:"mt-1 block w-full",required:"",autocomplete:"name"},null,8,["modelValue"])]),l(_,{message:o.form.errors.name,class:"mt-2"},null,8,["message"])]),e("div",Z,[e("div",$,[l(p,{class:"mr-4",for:"code",value:"code:"}),l(k,{id:"code",modelValue:o.form.code,"onUpdate:modelValue":a[1]||(a[1]=s=>o.form.code=s),type:"text",class:"mt-1 block w-full",required:"",autocomplete:"code"},null,8,["modelValue"])]),l(_,{message:o.form.errors.code,class:"mt-2"},null,8,["message"])])]),e("div",ee,[e("div",se,[e("div",te,[l(p,{class:"mr-4",for:"lecturer",value:"lecturer:"}),e("div",oe,[y(e("select",{"onUpdate:modelValue":a[2]||(a[2]=s=>o.form.lecturer=s),name:"lecturer",id:"lecturer",autocomplete:"lecturer",class:"capitalize block p-3 flex-1 border-0 bg-transparent text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"},[re,(t(!0),r(m,null,u(c.lecturers,s=>(t(),r("option",{class:"capitalize",key:s.id,value:s.id},f(s.name),9,le))),128))],512),[[v,o.form.lecturer]])])]),l(_,{message:o.form.errors.lecturer,class:"mt-2"},null,8,["message"])]),e("div",ae,[e("div",ie,[l(p,{class:"mr-4",for:"semester",value:"semester:"}),e("div",ne,[y(e("select",{"onUpdate:modelValue":a[3]||(a[3]=s=>o.form.semester=s),name:"semester",id:"semester",autocomplete:"semester",class:"capitalize block p-3 flex-1 w-2/3 border-0 bg-transparent text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"},[ce,(t(!0),r(m,null,u(c.semesters,s=>(t(),r("option",{class:"capitalize",key:s.id,value:s.id},f(s.name),9,de))),128))],512),[[v,o.form.semester]])])]),l(_,{message:o.form.errors.semester,class:"mt-2"},null,8,["message"])])]),e("div",me,[l(P,{onClick:h.addProgram},{default:g(()=>[b("Add Programme")]),_:1},8,["onClick"]),o.form.addedPrograms.length!==0?(t(),x(P,{key:0,onClick:h.removeProgram},{default:g(()=>[b("Remove Programme")]),_:1},8,["onClick"])):w("",!0)]),(t(!0),r(m,null,u(o.form.addedPrograms,(s,T)=>(t(),r("div",{key:"program"+T,class:"flex justify-around gap-5"},[e("div",ue,[e("div",fe,[l(p,{class:"mr-4",for:"programme",value:"programme:"}),e("div",pe,[y(e("select",{"onUpdate:modelValue":i=>s.programme=i,name:"programme",id:"programme",autocomplete:"programme",class:"capitalize block p-3 flex-1 border-0 bg-transparent text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"},[ge,(t(!0),r(m,null,u(c.programmes,i=>(t(),r("option",{class:"capitalize",key:i.id,value:i.id},f(i.name),9,he))),128))],8,_e),[[v,s.programme]])])]),l(_,{message:s.errors.programme,class:"mt-2"},null,8,["message"])]),e("div",xe,[e("div",ye,[l(p,{class:"mr-4",for:"Type",value:"course type:"}),e("div",ve,[y(e("select",{"onUpdate:modelValue":i=>s.type=i,name:"type",id:"type",autocomplete:"type",class:"capitalize block p-3 flex-1 border-0 bg-transparent text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"},[we,(t(!0),r(m,null,u(o.courseType,i=>(t(),r("option",{class:"capitalize",key:i,value:i},f(i),9,ke))),128))],8,be),[[v,s.type]])])]),l(_,{message:s.errors.type,class:"mt-2"},null,8,["message"])])]))),128)),e("div",Pe,[l(j,{class:V({"opacity-25":o.form.processing}),disabled:o.form.processing},{default:g(()=>[b(" create ")]),_:1},8,["class","disabled"])])])],32)])):w("",!0),c.courses.data.length!==0&&n.can("read courses")?(t(),r("div",Ve,[e("table",je,[Le,e("tbody",null,[(t(!0),r(m,null,u(c.courses.data,s=>(t(),r("tr",{key:s.id,class:"bg-white border-b dark:bg-gray-800 dark:border-gray-700"},[e("td",Ce,f(s.id),1),e("td",Te,f(s.name),1),e("td",Be,f(s.code),1),e("td",Ie,[n.can("update courses")?(t(),x(L,{key:0,class:"text-yellow-700 font-bold",href:n.route("courses.edit",s.id)},{default:g(()=>[b("Edit")]),_:2},1032,["href"])):w("",!0)])]))),128))])])])):(t(),r("div",Se," No courses have been created yet. ")),e("div",null,[e("div",ze,[c.courses.data.length!==0?(t(!0),r(m,{key:0},u(c.courses.links,s=>(t(),x(U(s.url?"Link":"span"),{href:s.url,innerHTML:s.label,class:V(["px-2",{"text-gray-500":!s.url,"font-bold":s.active}])},null,8,["href","innerHTML","class"]))),256)):w("",!0)])])])])])])]),_:1})}const He=O(D,[["render",Ue]]);export{He as default};
