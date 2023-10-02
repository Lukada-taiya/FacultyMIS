import{a as i}from"./Modal-97938c9a.js";import{o as c,c as n,w as r,a as t,s as o}from"./app-f76fb9b6.js";const m={class:"bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4"},d={class:"sm:flex sm:items-start"},h=t("div",{class:"mx-auto shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10"},[t("svg",{class:"h-6 w-6 text-red-600",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"},[t("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"})])],-1),x={class:"mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left"},f={class:"text-lg font-medium text-gray-900"},w={class:"mt-4 text-sm text-gray-600"},u={class:"flex flex-row justify-end px-6 py-4 bg-gray-100 text-right"},v={__name:"ConfirmationModal",props:{show:{type:Boolean,default:!1},maxWidth:{type:String,default:"2xl"},closeable:{type:Boolean,default:!0}},emits:["close"],setup(s,{emit:l}){const a=()=>{l("close")};return(e,_)=>(c(),n(i,{show:s.show,"max-width":s.maxWidth,closeable:s.closeable,onClose:a},{default:r(()=>[t("div",m,[t("div",d,[h,t("div",x,[t("h3",f,[o(e.$slots,"title")]),t("div",w,[o(e.$slots,"content")])])])]),t("div",u,[o(e.$slots,"footer")])]),_:3},8,["show","max-width","closeable"]))}};export{v as _};
