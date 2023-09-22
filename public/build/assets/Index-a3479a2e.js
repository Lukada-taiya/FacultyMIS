import{A as x}from"./AppLayout-b94b5261.js";import{i as u,j as c,o as e,c as n,w as r,a as s,d as a,f as p,t as o,b as h,e as y,F as d,M as f,n as g}from"./app-96571986.js";import{_ as b}from"./_plugin-vue_export-helper-c27b6911.js";const v={components:{AppLayout:x,Link:u},props:{users:Object}},w={class:"bg-gray-100 flex-1 p-6 md:mt-16"},L={class:"mt-6 max-w-3xl mx-auto py-10 sm:px-6 lg:px-8"},k=s("div",null,[s("h3",{class:"text-lg font-medium text-gray-900"}," All Users "),s("p",{class:"mt-1 mb-5 text-sm text-gray-600"}," Manage all the information of system users here ")],-1),A={class:"px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md"},B={class:"relative overflow-x-auto"},C={class:"w-full text-sm text-left text-gray-500"},M=s("thead",{class:"text-xs text-gray-700 uppercase bg-gray-50"},[s("tr",null,[s("th",{scope:"col",class:"px-6 py-3"},"#"),s("th",{scope:"col",class:"px-6 py-3"}," Name "),s("th",{scope:"col",class:"px-6 py-3"}," Email "),s("th",{scope:"col",class:"px-6 py-3"}," Role "),s("th",{scope:"col",class:"px-6 py-3"}," Actions ")])],-1),N={scope:"row",class:"px-6 py-4 font-medium whitespace-nowrap"},E={class:"px-6 py-4"},T={class:"px-6 py-4"},V={class:"px-6 py-4"},j={class:"px-6 py-4"},D={class:"mt-6 display:inline-block"};function F(i,H,l,$,z,I){const m=c("Link"),_=c("AppLayout");return e(),n(_,null,{default:r(()=>[s("div",w,[s("div",null,[s("div",L,[k,s("div",A,[s("div",B,[s("table",C,[M,s("tbody",null,[(e(!0),a(d,null,p(l.users.data,t=>(e(),a("tr",{key:t.id,class:"bg-white border-b"},[s("td",N,o(t.id),1),s("td",E,o(t.name),1),s("td",T,o(t.email),1),s("td",V,o(t.role),1),s("td",j,[h(m,{class:"text-yellow-700 font-bold",href:i.route("users.edit",t.id)},{default:r(()=>[y("Edit")]),_:2},1032,["href"])])]))),128))])])]),s("div",null,[s("div",D,[(e(!0),a(d,null,p(l.users.links,t=>(e(),n(f(t.url?"Link":"span"),{href:t.url,innerHTML:t.label,class:g(["px-2",{"text-gray-500":!t.url,"font-bold":t.active}])},null,8,["href","innerHTML","class"]))),256))])])])])])])]),_:1})}const U=b(v,[["render",F]]);export{U as default};