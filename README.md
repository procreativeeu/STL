STL
===
Development: [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/AGmakonts/STL/badges/quality-score.png?b=development)](https://scrutinizer-ci.com/g/AGmakonts/STL/?branch=development) [![Code Coverage](https://scrutinizer-ci.com/g/AGmakonts/STL/badges/coverage.png?b=development)](https://scrutinizer-ci.com/g/AGmakonts/STL/?branch=development) [![Build Status](https://scrutinizer-ci.com/g/AGmakonts/STL/badges/build.png?b=development)](https://scrutinizer-ci.com/g/AGmakonts/STL/build-status/development)

Simple Type Lib for PHP
-----------------------

Library inspired by [nicolopignatelli/valueobjects](https://github.com/nicolopignatelli/valueobjects/blob/master/src/ValueObjects/Null/Null.php). My goal was to create
a set of classes that will serve as a object oriented implementation of basic data types to fight with PHPs dynamic types and at the same time add few extra classes for
common tasks. One of the main features of STL is that all objects have one instance per value `String::get('Test') === String::get('Test')`. Thanks to that approach
it is easy to store objects in for example `SPLObjectStorage` or similar containers that depend od object hash.

All objects are immutable - this is required because instances are shared.

Requirements
------------

* PHP >= 5.4
* OpenSSL Extension

Quick start
-----------
```php
//Create or get String instance
$string = String::get('String value');
    
//Create or get Integer instance
$integer = Integer::get(12213);
    
//Chaining
    
$integer = Integer::get(10)->add(Integer::get(10));
```
    

Library parts description
-------------------------

### Number

All classes in `\Number` namespace are designed to handle numeric types. Decimal internally uses strings for compatibility
with bcmath functions but interface exposes scalar numbers.

### DateTime

...


Roadmap
-------

Currently, after quite a big rebuild (that is still in progress) only String is implemented almost fully, rest of planned data types and value objects is listed below:

- Number
    + Integer - Ready
    + Decimal - Ready
    + Fraction
- DateTime
    + Date
    + Year
    + Month
    + Week
    + Day
    + Time
    + Hour
    + Minute
    + Second
    + DateTime - Started
- Structure
    + TypedArray
    + TypedList
    + Dictionary
- Identity
    + UUID
    + Numeric 
    + Alphanumeric
    + Autonumeric - Ready
- Text
    + Word
    + Sentence
    + Paragraph

