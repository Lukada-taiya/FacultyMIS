import{i as c,K as d,O as u,o as n,d as o,F as m,f as p,a as t,t as a,n as r}from"./app-6c5b59c0.js";import{_ as x}from"./_plugin-vue_export-helper-c27b6911.js";const _={components:{Link:c},props:{customThreads:Object},data(){return{user:d().props.auth.user}},methods:{openRequest(s){u.get("/requests/"+s.id+"?approvalRequest="+s.approval)},messageType(s){if(this.user.id===s.sender.id)return"Sent:";if(this.user.id!=s.sender.id&&s.approval===null)return"Received:"}}},f={key:0,class:"flex-1 flex flex-col"},g=["onClick"],y={class:"w-10 h-10 overflow-hidden rounded-md"},v=["alt"],h=["textContent"],k={key:1,class:"text-sm text-gray-500 text-center"};function b(s,T,l,q,C,i){return l.customThreads.length!=0?(n(),o("div",f,[(n(!0),o(m,null,p(l.customThreads,e=>(n(),o("div",{onClick:R=>i.openRequest(e),key:e.id,class:"cursor-pointer flex items-center shadow-xs transition-all duration-300 ease-in-out p-5 hover:shadow-md"},[t("div",y,[t("img",{class:"img-responsive",src:"img/user.svg",alt:e.sender.name},null,8,v)]),t("h1",{class:r(["ml-3 text-sm",[e.isUnread?"text-gray-800 font-bold":"text-gray-500"]])},a(e.sender.name),3),t("p",{class:r(["ml-6 flex-1 text-sm",[e.isUnread?"text-gray-800 font-bold":"text-gray-500"]])},a(e.subject),3),t("span",{class:r([i.messageType(e)==="Sent:"?"text-red-700":"text-green-700","px-2 py-1 rounded-md text-sm font-bold"]),textContent:a(i.messageType(e))},null,10,h),t("p",{class:r(["text-sm",[e.isUnread?"text-gray-800 font-bold":"text-gray-500"]])},a(e.created_at),3)],8,g))),128))])):(n(),o("div",k," You have not received any requests yet. "))}const O=x(_,[["render",b]]);export{O as default};
