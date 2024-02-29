//1
db.getCollection("restaurants").find({});
//1Bis
db.restaurants.find({});
//2
db.getCollection("restaurants").find({"cuisine":"American"},{name":1});
//3
db.getCollection("restaurants").find({"cuisine":"American"},{"_id":0,"name":1});
//4
db.getCollection("restaurants").find({"cuisine":"American"}).count();
//5
db.getCollection("restaurants").find({"cuisine":"American"}).limit(10);
//6
db.getCollection("restaurants").findOne({"cuisine":"American"});
//7
db.getCollection("restaurants").find({"cuisine":"American"}).pretty();
//8
db.restaurants.find({"address.building": "2780" });  
//8Bis
db.restaurants.find({"address.building": {$eq:"2780"}});
//9
db.restaurants.find({"address.building": {$gte:"2780",$lte:"2790"}}).count();
//10
db.restaurants.find({"address.building": {$nin:["2780","2790"]}}).count();
//11
db.restaurants.find({"address.building":{$exists:1}}).count();
//12
db.restaurants.find({"address.building":{$not:{$exists:1}}}).count();
//13
db.restaurants.find({$and :[{"address.building":{$exists:1}},{"address.building":{$gte:"2780"}},{"address.building":{$lte:"3780"}}]},{"_id":0,name":1});
//14
db.restaurants.find({"address.building":{$exists:1,$nin:["2780","3780"]}},{"name":1});
//15
db.restaurants.find({"address.building":{$not:{$eq780"}}}).count(); 
//16
db.getCollection("restaurants").find({"restaurant_id":"40356018"});
//17
db.restaurants.updateOne({"restaurant_id" : "40356018"}, {$push: {"grades": {
            "date" : ISODate("2022-06-10T00:00:00.000+0000"),
            "grade" : "B",
            "score" : NumberInt(10)
        }}});
//18
db.restaurants.updateOne({"restaurant_id" : "40356018"}, {$pull: {"grades": {
            "date" : ISODate("2022-06-10T00:00:00.000+0000"),
            "grade" : "B",
            "score" : NumberInt(10)
        }}});
//19
db.restaurants.updateOne({"restaurant_id" : "40356018"}, {$addToSet: {"grades":  [{
            "date" : ISODate("2022-06-10T00:00:00.000+0000"),
            "grade" : "B",
            "score" : NumberInt(10)
        },
        
        {
            "date" : ISODate("2022-07-10T00:00:00.000+0000"),
            "grade" : "C",
            "score" : NumberInt(100)
        }]}});   
//20
db.restaurants.find({"grades.grade" :{$all: ["B","C"]}}).count();
//21
db.restaurants.find({"grades" : {$size: 5}}).count();
//22
db.restaurants.find({"grades": {$elemMatch: {"grade" : {$gte:"B",$lte:"D}}}}).count();
//23
db.restaurants.find({"grades.0.grade": "C"}).count();
//24
db.restaurants.find({}).sort({"name":1})
//25
db.restaurants.find({}).sort({"name":-1})
//26
db.restaurants.find({}).sort({"name":1,"restaurant_id" :-1});
//27
db.restaurants.find({ $expr: { $gt: [{ $strLenCP: "$cuisine" }, 20] } }, { "_id": 0, "name": 1 }).count();
//28
db.restaurants.aggregate([{$match:{"cuisine":"Hamburgers"}}]); 
//29
db.restaurants.aggregate( [{ 
   $match: { 
       "cuisine": "Hamburgers",
         "name": /^M/
   },
   $match: { 
       "address.building": {$gt: "70"} 
   } 
}] );

//30
db.restaurants.aggregate([{ 
   $addFields: { 
       "somme_grade": { $sum: "$grades.score" }
   } 
} 
, 
{ 
   $project: { 
       "_id": 0, 
       "name": 1, 
       "Somme": "$somme_grade" 
   } 
} 
]);

db.restaurants.aggregate(pipeline);

//31
db.restaurants.aggregate([{ 
   $addFields: { 
       "moyen_grade": { $avg: "$grades.score" }
   } 
}
, 
{ 
   $project: { 
       "_id": 0, 
       "name": 1, 
       "Moyenne": "$moyen_grade" 
   } 
} 
]);
//32
var pipeline = [{ 
    $group: { 
       "_id": "$address.building" 
   } 
}] ;

db.restaurants.aggregate(pipeline);
//32Bis
db.restaurants.distinct("address.building");

//33
var pipeline = [{ 
   $group: { 
       "_id": "$address.building", 
       "nb building": { $sum: 1 } 
   } 
}] 

db.restaurants.aggregate(pipeline);

//34
var pipeline = [{ 
   $group: { 
       "_id": "$address.zipcode", 
       "nb building": { $sum: 1 } 
   } 
}] 
 
db.restaurants.aggregate(pipeline);
//35
db.getCollection("restaurants").aggregate(
    [
        {
            "$project" : {
                "nb grades" : {
                    "$size" : "$grades"
                }
            }
        }
    ]
);

//36
var pipeline = [
        
        {
            "$group" : {
                "_id" : "$cuisine",
                "nb restaurants" : {
                    "$sum" : 1.0
                }
            }
        }
    ]
db.restaurants.aggregate(pipeline);

//37
var pipeline = [
        {
            "$project" : {
                "nb grades" : {
                    $cond: [{$isArray: "$grades"}, {"$size": "$grades"}, 0]
                }
            }
        }, 
        {
            "$group" : {
                "_id" : "$nb grades",
                "nb restaurants" : {
                    "$sum" : 1.0
                }
            }
        }
    ]

db.restaurants.aggregate(pipeline);
   
//38
var pipeline = [{ 
   $match: { 
       "grades.grade": "A" 
   } 
},
{   
      $unwind: "$grades" 
} ,
{ 
   $project: { 
       "_id":0,
       "restaurant_id": 1, 
       "name": 1,  
       "grades.grade": 1 
   } 
}];

db.restaurants.aggregate(pipeline);
