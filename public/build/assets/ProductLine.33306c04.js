import{u as f,j as y,G as x,k as h,o as v,d as b,a as s,b as a,w as o,h as l,t as n,v as w,J as g,f as e,l as k,F as V,y as S}from"./app.9995b85c.js";import{m as u}from"./matice.dff5312f.js";import"./index.86716a0c.js";import{_ as P}from"./Button.8b66cec4.js";import{_ as r}from"./Label.95def234.js";import{_ as N}from"./Checkbox.219ccc60.js";import{_ as $}from"./ActionMessage.d5af3d18.js";import{r as j}from"./ArrowPathIcon.7d6ad059.js";const A={class:"col-span-3 px-2 py-3 md:table-cell md:w-5/12 md:px-5 md:py-3"},B={class:"col-span-1 px-2 py-3 md:table-cell md:w-2/12 md:px-5 md:py-3"},C=l(" Type "),D=s("option",{class:"md:text-sm",value:"1"},"Linge",-1),F=s("option",{class:"md:text-sm",value:"2"},"Produit",-1),T=[D,F],L={class:"col-span-1 px-2 py-3 md:table-cell md:w-1/12 md:px-5 md:py-3"},M=l("Par D\xE9faut "),U={class:"col-span-1 px-2 py-3 flex flex-col items-center justify-center md:table-cell md:w-2/12 md:px-2 md:py-3"},E={class:"col-span-1 px-2 py-3 md:table-cell md:w-2/12 md:px-5 md:py-3"},R={__name:"ProductLine",props:{product:Object,message:String},setup(p){const c=p,t=f({id:c.product.id,name:c.product.name,default:!!c.product.default,type_id:c.product.type_id});y().props.value.initialProducts;const d=x({message:"",success:!1});function _(){t.put(route("update_product"),{preserveScroll:!0,onSuccess:()=>{d.success=!0}})}return h(d,async()=>{d.success&&setTimeout(function(){d.message="",d.success=!1,S.Inertia.visit("missing")},3e3)}),(G,i)=>(v(),b(V,null,[s("div",A,[a(r,{class:"md:hidden mb-2"},{default:o(()=>[l(" AAA"+n(e(u.trans)("auth.Name")),1)]),_:1}),l(" "+n(p.product.name),1)]),s("div",B,[a(r,{class:"md:hidden mb-2"},{default:o(()=>[C]),_:1}),w(s("select",{"onUpdate:modelValue":i[0]||(i[0]=m=>e(t).type_id=m),class:"w-full md:text-sm md:p-0 rounded-md border-0 outline outline-offset-2 outline-1 outline-slate-00"},T,512),[[g,e(t).type_id]])]),s("div",L,[a(r,{class:"md:hidden mb-2"},{default:o(()=>[M]),_:1}),a(N,{checked:e(t).default,modelValue:e(t).default,"onUpdate:modelValue":i[1]||(i[1]=m=>e(t).default=m)},null,8,["checked","modelValue"])]),s("div",U,[a(P,{type:"submit",disabled:e(t).processing,onClick:k(_,["prevent"])},{default:o(()=>[a(e(j),{class:"w-4 mr-1"})]),_:1},8,["disabled","onClick"])]),s("div",E,[a($,{on:d.success},{default:o(()=>[l(n(e(u.trans)("app.Saved")),1)]),_:1},8,["on"])])],64))}};export{R as default};
